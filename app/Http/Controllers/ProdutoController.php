<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

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

    // Armazenar o produto no banco de dados
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
            $image->move(public_path('images'), $imageName);
            $product->imagem = $imageName;
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
