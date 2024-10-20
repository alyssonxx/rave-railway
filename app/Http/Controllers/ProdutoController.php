<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    // Exibir a lista de produtos
    public function index()
    {
        $events = Products::all();
        return view("Pages.Marketplace", ['events' => $events]);
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
                    return redirect()->back()->withErrors('Erro ao fazer upload da imagem para o S3.');
                }
            } catch (\Exception $e) {
                // Tratar exceções que podem ocorrer durante o upload
                return redirect()->back()->withErrors('Erro durante o upload da imagem: ' . $e->getMessage());
            }
        }
    
        // Salvar o produto no banco de dados
        $product->save();
    
        // Redirecionar de volta ao marketplace com uma mensagem de sucesso
        return redirect('/marketplace')->with('success', 'Produto criado com sucesso!');
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
