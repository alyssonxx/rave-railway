<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/criacaoProduto.css">
    <title>Reventart</title>
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Artesãos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Como Funciona</a>
                            </li>
                        </ul>
                        <div class="action-nav">
                            <span class="navbar-text d-none">
                                Olá, <strong>Usuário</strong>
                            </span>
                            <button class="btn btn-primary" type="button">Acessar Conta</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="produto-content container">
        <div class="title-page">
            <h1>Criação de produto</h1>
            <span class="divider"></span>
            <p>Compartilhe sua criatividade e contribua para um futuro mais verde!</p>
        </div>

        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data"
            class="form-validate is-alter row">
            @csrf
            <div class="form-group col-sm-12">
                <label class="form-label" for="nome-produto">Nome do produto</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg" name="nomeP" id="nomeP" required>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label class="form-label" for="desc-produto">Descrição do produto</label>
                <div class="form-control-wrap">
                    <textarea class="form-control" style="width: 100%" name="descP" id="descP" required></textarea>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label class="form-label" for="preco-produto">Preço</label>
                <div class="form-control-wrap">
                    <input type="number" class="form-control form-control-lg" name="precoP" id="precoP" required>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <div class="form-control-wrap">
                    <label for="img-produto">Imagem do produto</label>
                    <input type="file" class="form-control-file" name="imagem" id="image-produto">
                </div>
            </div>

            <div class="form-group col-sm-12">
                <input type="submit" class="btn btn-green btn-lg btn-primary btn-block" value="Cadastrar">
            </div>
        </form>
    </div>

    <footer class="bg-dark text-white py-4 footer-revetart">
        <div class="container">
            <!-- Conteúdo do rodapé -->
        </div>
    </footer>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
