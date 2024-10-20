<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    public function home(Request $request)
    {
        $data = $request->session()->all();
        return view("pages.Home", ['teste' => $data]);
    }


    // Exibir a lista de produtos
    public function index()
    {
        $events = Products::all();
        return view("pages.Marketplace", ['events' => $events]);
    }

    // Formulário de criação de produto
    public function create()
    {
        return view('events.CriacaoProduto');
    }
    
    public function store(Request $request)
    {
        // Validação dos dados do request
        $validatedData = $request->validate([
            'nomeP' => 'required|string|max:255',
            'descP' => 'required|string',
            'precoP' => 'required|numeric',
            'imagem' => 'nullable|image|max:2048'
        ]);
    
        // Criando uma nova instância de produto
        $product = new Products();
        $product->nomeP = $validatedData['nomeP'];
        $product->descP = $validatedData['descP'];
        $product->precoP = $validatedData['precoP'];
        $product->user_id = Auth::id(); // Vincular ao usuário autenticado
    
        // Verificar se uma imagem foi enviada e processá-la
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $extension = $image->getClientOriginalExtension();
            $imageName = md5($image->getClientOriginalName() . microtime()) . '.' . $extension;
    
            // Tente armazenar a imagem no S3
            try {
                $path = $image->storeAs('images', $imageName, 's3');
    
                // Verifique se o caminho foi gerado corretamente
                if ($path) {
                    // Obter a URL da imagem no S3
                    $url = Storage::disk('s3')->url($path);
                    // Salvar a URL da imagem no banco de dados
                    $product->imagem = $url;
                } else {
                    return response()->json(['error' => 'Erro ao fazer upload da imagem para o S3.'], 500);
                }
            } catch (\Exception $e) {
                // Tratar exceções que podem ocorrer durante o upload
                return response()->json(['error' => 'Erro durante o upload da imagem: ' . $e->getMessage()], 500);
            }
        }
    
        // Salvar o produto no banco de dados
        $product->save();
    
        // Retornar resposta de sucesso
        return response()->json(['success' => 'Produto criado com sucesso!']);
    }
    

    public function show($id)
    {
        $products = Products::find($id);

        if (!$products) {
            abort(404); // Retorna 404 se o produto não for encontrado
        }

        return view('pages.PaginaProduto', compact('products'));
    }
}
