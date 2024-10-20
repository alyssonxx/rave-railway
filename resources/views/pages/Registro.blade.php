<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/registro.css">
    <title>Registro</title>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <a href="{{ route('pages.Home') }}"><img src="/assets/images/logo.png" alt="Logo" class="logo"></a>
            <h2>Registrar</h2>
            <form id="registerForm" action="/register" method="POST">
                @csrf
                <div>
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <button class="register-btn" type="submit">Registrar</button>
            </form>
            <p>Tem uma conta? <a href="{{ route('login') }}">Clique aqui pra voltar</a></p>
        
        <div id="error-messages" class="alert alert-danger" style="display:none;"></div>
        <div id="success-message" class="alert alert-success" style="display:none;"></div>
        </div>
    </div>
    <script src="/assets/libs/jquery/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>