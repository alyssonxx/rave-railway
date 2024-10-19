<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/marketplace.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>MarketPlace</title>
</head>

<body>
    <header class="header-reventart">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light nav-revetart">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img class="logo" src="/assets/images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="./Home.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Artesãos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Como Funciona</a></li>
                        </ul>
                        <div class="action-nav">
                            <span class="navbar-text">Olá, <strong>Usuário</strong></span>
                            <button class="btn btn-primary" type="button">Acessar Conta</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Container Principal -->
    <div class="container market-content">
        <div class="mb-4">
            <div class="title-page">
                <h1>MarketPlace</h1>
                <p>Descubra produtos únicos e sustentáveis criados por artesãos...</p>
            </div>
            <!-- Filtros e Barra de Ordenação aqui -->
        </div>
        <!-- Grade de Produtos -->
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($events as $event)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="/images/{{ $event->imagem }}" class="card-img-top" alt="{{ $event->nome }}">
                            <div class="card-body"><a href=""></a>
                                <h5 class="card-title">{{ $event->nomeP }}</h5>
                                <p class="card-text">{{ $event->descP }}</p>
                                <p class="card-text">R$ {{ number_format($event->precoP, 2, ',', '.') }}</p>
                                <a href="/pagina-produto/{{ $event->id }}" class="gallery">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Paginação -->
        <div class="pagination-container">
            <!-- Paginação aqui, se necessário -->
        </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <footer class="bg-dark text-white py-4 footer-revetart">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Reventart</h3>
                    <p>Reventart é o marketplace líder para artesãos sustentáveis, conectando criadores que transformam
                        materiais recicláveis em arte única com consumidores conscientes.</p>
                </div>
                <div class="col-md-3">
                    <h3>Categorias</h3>
                    <ul>
                        <li><a href="#">Decoração Sustentável</a></li>
                        <li><a href="#">Moda Reciclada</a></li>
                        <li><a href="#">Móveis Ecológicos</a></li>
                        <li><a href="#">Bijuterias Sustentáveis</a></li>
                        <li><a href="#">Arte e Esculturas</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Empresa</h3>
                    <ul>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Como Funciona</a></li>
                        <li><a href="#">Termos & Condições</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Conta</h3>
                    <ul>
                        <li><a href="#">Entrar / Registrar</a></li>
                        <li><a href="#">Ver Carrinho</a></li>
                        <li><a href="#">Política de Devolução</a></li>
                        <li><a href="#">Torne-se um Artesão</a></li>
                        <li><a href="#">Programa de Afiliados</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Copyright © 2024 Reventart. Todos os Direitos Reservos</p>
            </div>
        </div>
    </footer>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
