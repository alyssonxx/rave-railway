<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Exibe o formulário de registro
    public function showRegistrationForm()
    {
        return view('pages.Registro');  // Retorna a view do formulário de registro
    }

    // Lida com o registro do usuário
    public function register(Request $request)
    {
    // Validação dos campos do formulário
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' verifica se o campo 'password_confirmation' está igual
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As senhas não correspondem.',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash para a senha
        ]);

        // Autentica o usuário recém-criado
        Auth::login($user);


        // Redireciona para o dashboard ou outra página protegida
        return redirect()->intended('/login');
    }

    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('pages.Login');  // Retorna a view do formulário de login
    }

    // Lida com o login do usuário
    public function login(Request $request)
    {
        // Validação dos campos do formulário
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Tenta autenticar o usuário com as credenciais fornecidas
        if (Auth::attempt($credentials)) {
            // Se autenticado, gera uma nova sessão para o usuário
            $request->session()->regenerate();

            // Adiciona dados adicionais à sessão, se necessário
            $user = Auth::user();
            $request->session()->put('user_role', $user->role); // Exemplo: armazenar o papel do usuário
            $request->session()->put('user_name', $user->name); // Armazenar o nome do usuário
            $request->session()->put('user_id', $user->id); // Armazenar o nome do usuário
            $request->session()->put('user_email_verified_at', $user->email_verified_at);
            $request->session()->put('user_descricao', $user->descricao);
            $request->session()->put('user_instagram', $user->instagram);
            $request->session()->put('user_whatsapp', $user->whatsapp);


            // Retorna uma resposta JSON de sucesso
            // return response()->json(['success' => true]);
            // return redirect()->route('pages.Home')->with('success', 'Login realizado com sucesso!');
            // Redireciona para a página de perfil do usuário autenticado

            return redirect()->route('user.profile')->with('success', 'Login realizado com sucesso!');
        }

        // Se as credenciais forem inválidas, retorna um erro
        return response()->json(['errors' => ['email' => ['Credenciais inválidas.']]], 422);
    }

    // Lida com o logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redireciona para a página de login
    }


    public function profile()
    {
        // Obtém o usuário autenticado
        $user = Auth::user();

        // Retorna a view de perfil do usuário passando os dados do usuário
        return view('pages.usuario.meuPerfil', compact('user'));
    }


    // public function edit($id)
    // {
    //     // Recupera o usuário pelo ID
    //     $user = User::findOrFail($id);
    
    //     // Retorna a view com o usuário
    //     return view('pages.EditarPerfil', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validação dos campos
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,'.$id,
    //         'descricao' => 'nullable|string',
    //         'instagram' => 'nullable|string',
    //         'whatsapp' => 'nullable|string',
    //     ]);
    
    //     // Atualiza os dados do usuário
    //     $user = User::findOrFail($id);
    //     $user->update($request->all());
        
    
    //     return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
    // }

}

