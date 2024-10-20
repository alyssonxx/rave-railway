<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Products;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function paginaUsuario($id)
    {
        // Buscando informações do vendedor
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Vendedor não encontrado.');
        }

        // Buscando produtos do vendedor
        $produtos = Products::where('id_usuario', $id)->get();

        // Buscando avaliações dos produtos do vendedor
        $comentarios = Comentarios::where('id_usuario_destino', $id)->get();

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
        return view('pages.PaginaUsuario', $dados);
    }
}
