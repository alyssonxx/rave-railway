<header class="header-reventart">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-revetart">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('pages.Home') }}">
                    <img class="logo" src="/assets/images/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('produto.marketplace') }}">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Artesãos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Como Funciona</a></li>
                    </ul>
                    <div class="action-nav">
                        @if(session('user_name'))
                            <li class="user navbar-item"><a href="{{ route('user.profile') }}"> Olá, {{ session('user_name') }}!</a></li>
                            <li class="logout navbar-item"><a href="/logout">Sair</a></li>
                        @else
                            <li class="login-btn navbar-item"><a href="/login">Login</a></li>
                            <li class="register-btn navbar-item"><a href="/register">Registrar</a></li>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>