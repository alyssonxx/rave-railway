<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function home()
    {
        $produtosRandomizados = Products::inRandomOrder()->take(4)->get();
        $colaboradoresEmDestaque = User::inRandomOrder()->take(3)->get();
    
        return view('pages.home', compact('produtosRandomizados', 'colaboradoresEmDestaque'));
    }

    public function paginaUsuario($id = null)
    {
            $usuario = User::find($id);
        
        if (!$usuario) {
            return redirect()->back()->with('error', 'Vendedor não encontrado.');
        }
            $produtos = Products::where('id_usuario', $id)->get();
    

        $comentarios = Comentario::where('id_usuario_destino', $id)->with('usuario')->get(); // Certifique-se de que 'usuario' esteja relacionado corretamente no modelo Comentario
    

        $dados = [
            'vendedor' => $usuario,
            'produtos' => $produtos,
            'comentarios' => $comentarios, // Corrigido para 'comentarios'
            'contatos' => [
                'email' => $usuario->email,
                'instagram' => $usuario->instagram,
                'whatsapp' => $usuario->whatsapp,
            ],
        ];
    
        // Retornando a view com os dados 
        return view('pages.PaginaUsuario', [
            'dadosVendedor' => $dados['vendedor'],
            'dadosProdutos' => $dados['produtos'],
            'dadosContato' => $dados['contatos'],
            'comentarios' => $dados['comentarios'] // Corrigido para 'comentarios'
        ]);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('pages.EditarPerfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'descricao' => 'nullable|string',
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->descricao = $request->input('descricao');
        $user->instagram = $request->input('instagram');
        $user->whatsapp = $request->input('whatsapp');

        try {
            // Atualiza a imagem de perfil, se fornecida
            if ($request->hasFile('profile_image')) {
                if ($request->file('profile_image')->isValid()) {
                    if (!empty($user->profile_image)) {
                        $profileImageKey = str_replace(Storage::disk('s3')->url(''), '', $user->profile_image);
                        Storage::disk('s3')->delete($profileImageKey);
                    }

                    $profileImage = $request->file('profile_image');
                    $profileImageName = md5($profileImage->getClientOriginalName() . microtime()) . '.' . $profileImage->getClientOriginalExtension();
                    $profileImagePath = $profileImage->storeAs('images', $profileImageName, 's3');

                    if ($profileImagePath) {
                        $user->profile_image = Storage::disk('s3')->url($profileImagePath);
                    }
                }
            }

            // Atualiza a imagem de banner, se fornecida
            if ($request->hasFile('banner_image')) {
                if ($request->file('banner_image')->isValid()) {
                    if (!empty($user->banner_image)) {
                        $bannerImageKey = str_replace(Storage::disk('s3')->url(''), '', $user->banner_image);
                        Storage::disk('s3')->delete($bannerImageKey);
                    }

                    $bannerImage = $request->file('banner_image');
                    $bannerImageName = md5($bannerImage->getClientOriginalName() . microtime()) . '.' . $bannerImage->getClientOriginalExtension();
                    $bannerImagePath = $bannerImage->storeAs('images', $bannerImageName, 's3');

                    if ($bannerImagePath) {
                        $user->banner_image = Storage::disk('s3')->url($bannerImagePath);
                    }
                }
            }

            $user->save();
            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors('Erro ao atualizar o perfil.');
        }
    }

    public function artesoes()
    {
        $artesoes = User::paginate(9);
        return view('pages.artesoes', compact('artesoes'));
    }

    public function armazenarComentario(Request $request, $perfilId)
    {
        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        $comentario = new Comentario();
        $comentario->id_usuario_origem = auth()->id();
        $comentario->id_usuario_destino = $perfilId;
        $comentario->comentario = $request->comentario;
        $comentario->save();

        return redirect()->route('pages.PaginaUsuario', $perfilId)->with('success', 'Comentário adicionado com sucesso!');
    }
}