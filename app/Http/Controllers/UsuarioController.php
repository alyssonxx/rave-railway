<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UsuarioController extends Controller
{
    public function paginaUsuario($id = 2)
    {
        // Buscando informações do vendedor
        $usuario = User::find($id);
        
        if (!$usuario) {
            return redirect()->back()->with('error', 'Vendedor não encontrado.');
        }

        // Buscando produtos do vendedor
        $produtos = Products::where('id_usuario', $id)->get();

        // Buscando avaliações dos produtos do vendedor
        if(!empty($comentarios)){
            $comentarios = Comentarios::where('id_usuario_destino', $id)->get();
        }
        if(empty($comentarios)){
            $comentarios = "Nenhum Comentario encontrado";
        }

        // Preparando os dados para a página
        $dados = [
            'vendedor' => $usuario,
            'produtos' => $produtos,
            'avaliacoes' => $comentarios,
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
            'dadosContato' => $dados['contatos']
        ]);
    }


// Exibe o formulário de edição de perfil
public function edit()
{
    $user = Auth::user(); // Obtém o usuário logado
    return view('pages.EditarPerfil', compact('user')); // Retorna a view de edição com os dados do usuário
}

// Atualiza os dados do usuário
public function update(Request $request)
{
    $user = Auth::user(); // Obtém o usuário autenticado

    // Valida os dados de entrada
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'descricao' => 'nullable|string',
        'instagram' => 'nullable|string|max:255',
        'whatsapp' => 'nullable|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Atualiza os campos básicos
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->descricao = $request->input('descricao');
    $user->instagram = $request->input('instagram');
    $user->whatsapp = $request->input('whatsapp');

    try {
        if ($request->hasFile('profile_image')) {
            if ($request->file('profile_image')->isValid()) {
                $profileImage = $request->file('profile_image');
                $profileImageName = md5($profileImage->getClientOriginalName() . microtime()) . '.' . $profileImage->getClientOriginalExtension();
                $profileImagePath = $profileImage->storeAs('images', $profileImageName, 's3');

                if (!$profileImagePath) {
                    return back()->withErrors('Erro ao armazenar a imagem no S3.');
                }

                $user->profile_image = Storage::disk('s3')->url($profileImagePath);
                \Log::info('Imagem de perfil salva: ' . $user->profile_image);
            } else {
                return back()->withErrors('Imagem de perfil não é válida.');
            }
        }

        if ($request->hasFile('banner_image')) {
            if ($request->file('banner_image')->isValid()) {
                // Remove o banner anterior se existir
                if (!empty($user->banner_image)) {
                    $bannerKey = str_replace(Storage::disk('s3')->url(''), '', $user->banner_image);
                    if (!empty($bannerKey)) {
                        Storage::disk('s3')->delete($bannerKey);
                    }
                }

                $bannerImage = $request->file('banner_image');
                $bannerImageName = md5($bannerImage->getClientOriginalName() . microtime()) . '.' . $bannerImage->getClientOriginalExtension();
                $bannerImagePath = $bannerImage->storeAs('images', $bannerImageName, 's3');

                if (!$bannerImagePath) {
                    return back()->withErrors('Erro ao armazenar o banner no S3.');
                }

                $user->banner_image = Storage::disk('s3')->url($bannerImagePath);
                \Log::info('Banner salvo: ' . $user->banner_image);
            } else {
                return back()->withErrors('Imagem de banner não é válida.');
            }
        }

        // Salva as alterações
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
    } catch (\Exception $e) {
        \Log::error('Erro ao atualizar o perfil: ' . $e->getMessage());
        return back()->withErrors('Erro ao atualizar o perfil.');
    }
}



}
