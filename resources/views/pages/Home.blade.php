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

    <!-- Seção de Seleção em Destaque -->
    <section class="featured-products">
        <div class="container">
            <div class="featured-header">
                <h2>Seleção em Destaque</h2>
                <span class="divider"></span>
                <p>Descubra as Escolhas Que Estão em Alta no Momento</p>
            </div>
            <div class="featured-container">
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                            <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                            <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                            <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                            <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                            <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                            <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                            <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                            <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/pulseira.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/pulseira.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa2.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img">
                        <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
                        <div class="hover-text">
                        <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                        <p class="hover-artesao">Mariana Costa</p>
                        </div>
                    </div>
                </div>
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
                            Comprei uma bolsa feita pela Mariana e fiquei impressionada com a qualidade e o design. Saber que é feita com materiais recicláveis me deixa ainda mais feliz em usá-la todos os dias!
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                            </div>
                            <span class="text-muted">Beatriz Souza</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="/assets/images/bolsa.jpg" alt="Bolsa de Tecido Reaproveitado" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Bolsa de Tecido Reaproveitado</h6>
                                <p class="text-muted mb-0">R$ 150,00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonials-card">
                        <p class="mb-1 text-start">
                            Comprei uma bolsa feita pela Mariana e fiquei impressionada com a qualidade e o design. Saber que é feita com materiais recicláveis me deixa ainda mais feliz em usá-la todos os dias!
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                            </div>
                            <span class="text-muted">Beatriz Souza</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="/assets/images/bolsa.jpg" alt="Bolsa de Tecido Reaproveitado" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Bolsa de Tecido Reaproveitado</h6>
                                <p class="text-muted mb-0">R$ 150,00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonials-card">
                        <p class="mb-1 text-start">
                            Comprei uma bolsa feita pela Mariana e fiquei impressionada com a qualidade e o design. Saber que é feita com materiais recicláveis me deixa ainda mais feliz em usá-la todos os dias!
                        </p>
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="me-2">
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                            </div>
                            <span class="text-muted">Beatriz Souza</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="/assets/images/bolsa.jpg" alt="Bolsa de Tecido Reaproveitado" class="img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">Bolsa de Tecido Reaproveitado</h6>
                                <p class="text-muted mb-0">R$ 150,00</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Colaboradores -->
    <section class="collaborators py-5">
        <div class="container">
            <h2 class="text-center mb-4">Colaboradores em Destaque</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="/assets/images/profile-example.jpg" class="card-img-top" alt="Joana Silva com seu cachorro">
                        <div class="card-body">
                        <h5 class="card-title">Joana Silva</h5>
                        <p class="card-text">
                            Joana transforma materiais descartados, como madeira e vidro, em peças únicas de decoração para casas sustentáveis. Sua paixão pela natureza é refletida em cada detalhe das suas criações artesanais. Com mais de 5 anos de experiência, ela acredita que cada objeto pode ter uma nova vida.
                        </p>
                        <a href="#" class="btn btn-success">
                            Conheça agora <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/assets/images/profile-example.jpg" class="card-img-top" alt="Joana Silva com seu cachorro">
                        <div class="card-body">
                        <h5 class="card-title">Joana Silva</h5>
                        <p class="card-text">
                            Joana transforma materiais descartados, como madeira e vidro, em peças únicas de decoração para casas sustentáveis. Sua paixão pela natureza é refletida em cada detalhe das suas criações artesanais. Com mais de 5 anos de experiência, ela acredita que cada objeto pode ter uma nova vida.
                        </p>
                        <a href="#" class="btn btn-success">
                            Conheça agora <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/assets/images/profile-example.jpg" class="card-img-top" alt="Joana Silva com seu cachorro">
                        <div class="card-body">
                        <h5 class="card-title">Joana Silva</h5>
                        <p class="card-text">
                            Joana transforma materiais descartados, como madeira e vidro, em peças únicas de decoração para casas sustentáveis. Sua paixão pela natureza é refletida em cada detalhe das suas criações artesanais. Com mais de 5 anos de experiência, ela acredita que cada objeto pode ter uma nova vida.
                        </p>
                        <a href="#" class="btn btn-success">
                            Conheça agora <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection