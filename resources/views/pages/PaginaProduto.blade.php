@extends('layouts.app')
@section('title', 'Página de produto')

@section('styles')
    <link rel="stylesheet" href="/assets/css/paginaProduto.css">
@endsection

@section('content')
  <main class="product-page">
      <div class="container">
          <section class="product-details">
              <div class="product-image">
                  <img src="/images/{{ $products->imagem }}" alt="{{ $products->nomeP }}">
              </div>
              
              <div class="product-info">

              <h1 class="title-product">{{ $products->nomeP }}</h1>
              <h2>R$ {{ number_format($products->precoP, 2, ',', '.') }}</h2>
              <p class="description-product">{{ $products->descP }}</p>

                  <div class="actions">
                      <a href="./PaginaUsuario.html" class="contact">Entre em contato</a>
                      <a href="./PaginaUsuario.html" class="gallery">Veja Galeria</a>
                  </div>
              </div>
          </section>

          <section class="related-products">
              <h2 class="title">Produtos relacionados</h2>
              <div class="related-items">
                <div class="row">
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
                      <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
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
                  <img src="/assets/images/bolsa.jpg" class="card-img-top" alt="Produto 1">
                  <div class="hover-text">
                    <p class="hover-title">Bolsa de Tecido Reaproveitado</p>
                    <p class="hover-artesao">Mariana Costa</p>
                  </div>
              </div>
          </div>
                </div>
              </div>
              <div class="view-box">
                  <a class="view-all" href="./Marketplace.html">Conheça todos os produtos</a>
              </div>
          </section>
      </div>
  </main>
@endsection

    


    