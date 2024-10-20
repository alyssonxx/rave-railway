<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        
        <div class="login-box">
            <a href="{{ route('pages.Home') }}"><img src="/assets/images/logo.png" alt="Logo" class="logo"></a>
            <h2>Entrar</h2>
            @if ($errors->any())
                <div>
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <form  id="loginForm" action="/login" method="POST">
                @csrf
                <label for="email">Email</label>
                <input name="email" type="email" id="email" placeholder="Coloque seu email" required>
                
                <label for="senha">Senha</label>
                <input name="password" type="password" id="password" placeholder="Coloque sua senha" required>
                
                <button type="submit" class="login-btn">Entrar <span class="icon">⮞</span></button>
            </form>
            <p>Não tem uma conta? <a href="{{ route('register') }}">Clique aqui pra se registrar</a></p>
        </div>
    </div>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets/libs/jquery/js/jquery-3.6.0.min.js""></script>
</body>
</html>