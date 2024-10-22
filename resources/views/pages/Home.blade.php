@extends('layouts.app')
@section('title', 'Reventart')

@section('styles')
    <link rel="stylesheet" href="/assets/css/home.css">
@endsection


@section('content')
    <!-- Banner principal -->
    <section class="main-banner">
        <div class="banner-text text-center">
        </div>
    </section>
    <!-- Seção de Categorias -->
    <section class="categories py-5">
        <div class="container text-center">
            <h2 class="mb-4">Categorias</h2>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="category-item">
                        <img src="/assets/images/vaso.jpg" alt="Decoração Sustentável">
                        <p>Decoração Sustentável</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-item">
                        <img src="/assets/images/bolsa.jpg" alt="Moda Reciclada">
                        <p>Moda Reciclada</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-item">
                        <img src="/assets/images/bolsa2.jpg" alt="Móveis Ecológicos">
                        <p>Móveis Ecológicos</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-item">
                        <img src="/assets/images/pulseira.jpg" alt="Bijuterias Sustentáveis">
                        <p>Bijuterias Sustentáveis</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="category-item">
                        <img src="/assets/images/vaso.jpg" alt="Arte e Esculturas">
                        <p>Arte e Esculturas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Seção de Produtos em Destaque -->
    <section class="featured-products">
        <div class="container">
            <div class="featured-header">
                <h2>Seleção em Destaque</h2>
                <span class="divider"></span>
                <p>Descubra as Escolhas Que Estão em Alta no Momento</p>
            </div>
        <div class="row product-destaque">
            @if(isset($produtosRandom) && $produtosRandom->isNotEmpty())
                @foreach($produtosRandom as $produto)
                    <div class="col-md-3">
                        <div class="card-img">
                            <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nomeP }}">
                            <div class="hover-text">
                                <p class="hover-title">{{ $produto->nomeP }}</p>
                                <p class="hover-artesao">{{ $produto->artesao ?? 'Artesão Desconhecido' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Nenhum produto em destaque no momento.</p>
            @endif
        </div>
    </div>
</section>

    <!-- Container verde para "Junte-se a nós" -->
    <section class="join-us-section">
        <div class="container">
            <div class="call-to-action">
                <h2>Junte-se a nós!</h2>
                <p>Faça Parte da Comunidade de Artesãos Sustentáveis. Contribua com sua arte e criatividade, transformando materiais recicláveis em produtos únicos. </p>
                <p class="text-bold">Cadastre-se agora e comece a transformar o mundo através da arte reciclável! </p>
                <button class="btn btn-primary">Cadastre-se</button>
            </div>
            <div class="img-call">
                <img src="/assets/images/call-img.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- Produtos em destaque -->
    <section class="featured-products py-5">
        <div class="container">
            <h6 class="text-center mb-0">Conheça mais</h6>
            <h2 class="text-center mb-4">Nossos Produtos Mais Vendidos</h2>
            <div class="row product-destaque">
                @if(isset($produtosRandomOito) && $produtosRandomOito->isNotEmpty())
                    @foreach($produtosRandomOito as $produto)
                        <div class="col-md-3">
                            <div class="card-img">
                                <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nomeP }}">
                                <div class="hover-text">
                                    <p class="hover-title">{{ $produto->nomeP }}</p>
                                    <p class="hover-artesao">{{ $produto->artesao ?? 'Artesão Desconhecido' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Nenhum produto em destaque no momento.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Container amarelado para depoimentos -->
    <section class="testimonials-section text-center py-5 bg-yellow">
        <div class="container">
            <h2>Depoimentos de Artesãos</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonials-card">
                        <p class="mb-1 text-start">
                            A Galinha de Barro do Alexandre é uma peça encantadora! O cuidado nos detalhes e o uso de materiais naturais realmente mostram o talento do artesão.
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                            </div>
                            <span class="text-muted">Alexandre</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://rave-railway.s3.us-east-2.amazonaws.com/images/d83848c8707748943c11dbae0f20a701.png" alt="Galinha de Barro" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Galinha de Barro</h6>
                                <span class="text-muted">Uma peça de barro em formato de galinha d' angola</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonials-card">
                        <p class="mb-1 text-start">
                            O Puff de Tonel é super confortável e resistente! A madeira reutilizada dá um toque rústico, e a ideia de usar um tonel é genial.
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                            </div>
                            <span class="text-muted">Alexandre</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://rave-railway.s3.us-east-2.amazonaws.com/images/d981412146c93e338f21679edf6af985.png" alt="Puff de Tonel" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Puff de Tonel</h6>
                                <span class="text-muted">Um puff feito de madeira e tonel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonials-card">
                        <p class="mb-1 text-start">
                            O Abajur Sustentável do Lucas é incrível! Perfeito para a decoração eco-friendly que estou montando em casa, além de super funcional.
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                                <span class="text-warning">★</span>
                            </div>
                            <span class="text-muted">Lucas da Silva</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://rave-railway.s3.us-east-2.amazonaws.com/images/9662b04416f8e670b5319a610ba5442a.jpeg" alt="Abajur Sustentável" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Abajur Sustentável</h6>
                                <span class="text-muted">Abajur feito com materiais sustentáveis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Colaboradores em Destaque -->
<section class="collaborators py-5">
        <div class="container">
            <h2 class="text-center mb-4">Colaboradores em Destaque</h2>
            <div class="row">
            @if(isset($colaboradoresRandom) && $colaboradoresRandom->isNotEmpty())
                @foreach($colaboradoresRandom as $colaborador)
                    <div class="col-md-4">
                        <div class="card collaborator-card">
                        <img src="<?= (!empty($colaborador->profile_image) ? $colaborador->profile_image : '/assets/images/profile-example.jpg' );?>" class="card-img-top" alt="{{ $colaborador->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $colaborador->name }}</h5>
                                <p class="card-text">{{ $colaborador->descricao }}</p>
                                <a href="{{ route('pages.PaginaUsuario', $colaborador->id) }}" class="btn btn-success">
                                    Conheça agora <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Nenhum colaborador disponível no momento.</p>
            @endif
        </div>
    </div>
</section>
@endsection