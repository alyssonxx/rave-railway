@extends('layouts.app')
@section('title', 'MarketPlace')

@section('styles')
    <link rel="stylesheet" href="/assets/css/marketplace.css">
@endsection

@section('content')
    <!-- Container Principal -->
    <div class="container market-content">
        <div class="mb-4">
            <div class="title-page">
                <h1>MarketPlace</h1>
                <span class="divider"></span>
                <p>Descubra produtos únicos e sustentáveis criados por artesãos que transformam materiais reciclados em verdadeiras obras de arte. Apoie o consumo consciente e faça parte de um futuro mais verde. Confira os produtos abaixo!</p>
            </div>
            <div class="header-market">
                <div class="d-flex w-100 justify-content-between">
                <p class="title">Produtos do marketplace</p>
                <!-- <select class="form-select w-auto" aria-label="Ordenar por">
                    <option selected>Ordenar por</option>
                    <option value="1">Preço: Menor para Maior</option>
                    <option value="2">Preço: Maior para Menor</option>
                    <option value="3">Mais Populares</option>
                </select> -->
                </div>
            </div>
        </div>
    
    
        <div class="container market-products">
            <div class="row-produtos row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($events as $event)
                <a href="/pagina-produto/{{ $event->id }}" class="col-md-4">
                    <div class="card-img">
                        <img src="/images/{{ $event->imagem }}" class="card-img-top" alt="Produto {{ $event->id }}">
                        <div class="hover-text">
                            <p class="hover-title">{{ $event->nomeP }}</p>
                            <p class="hover-artesao">{{ $event->descP }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
        </div>    


        <!-- Paginação -->
        <div class="pagination-container">
            <!-- Paginação aqui, se necessário -->
        </div>
    </div>
@endsection



