@extends('layouts.app')
@section('title', 'Página de usuario')

@section('styles')
  <link rel="stylesheet" href="/assets/css/paginaUsuario.css">
@endsection

@section('content')
  <section class="header">
    <div class="container">
      <div class="header-perfil">
        <div class="banner-perfil" style="background-image: url('/assets/images/banner-example.jpg');"></div>
        <div class="user-info">
          <div class="photo-profile">
            <img src="/assets/images/profile-example.jpg" alt="">
          </div>
          <div class="text-profile">
            <h2 class="name">$usuario->name</h2>
            <p class="description">$usuario->descricao</p>
          </div>
          <span class="divider"></span>
          <div class="redes-user">
            <p class="text">Formas de Contato</p>
            <div class="redes">
              <img src="/assets/images/icones/mail.svg" alt="">
              <img src="/assets/images/icones/phone.svg" alt="">
              <img src="/assets/images/icones/instagram.svg" alt="">
              <img src="/assets/images/icones/whatsapp.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-content-perfil">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="galeria-tab" data-bs-toggle="tab" href="#galeria" role="tab"
            aria-controls="galeria" aria-selected="true">Galeria</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contato-tab" data-bs-toggle="tab" href="#contato" role="tab" aria-controls="contato"
            aria-selected="false">Contato</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="sobre-tab" data-bs-toggle="tab" href="#sobre" role="tab" aria-controls="sobre"
            aria-selected="false">Sobre o Artesão</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="avaliacoes-tab" data-bs-toggle="tab" href="#avaliacoes" role="tab"
            aria-controls="avaliacoes" aria-selected="false">Avaliações</a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
          <div class="container my-4 galery-content">
            <div class="row">
              <div class="col-md-3">
                <div class="card-img">
                    @foreach ($usuarios as $usuario)
                  <img src="/assets/images/pulseira.jpg" class="card-img-top" alt="Produto 1">
                  <div class="hover-text">
                    <p class="hover-title">{{$produto->nomeP}}</p>
                    <p class="hover-artesao">{{$usuario->name}}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">
          <div class="content-contato">
            <h2 class="title-tab">Formas de contato</h2>
            <ul class="list-social">
              <li>
                <p class="social-rede">Email</p>
                <a href="mailto:email@gmail.com"><p class="social-name">email@gmail.com</p></a>
              </li>
              <li>
                <p class="social-rede">Telefone</p>
                <a href="tel:+5590000-0000" target="_blank"><p class="social-name">+5590000-0000</p></a>
              </li>
              <li>
                <p class="social-rede">Instagram</p>
                <a href="" target="_blank"><p class="social-name">@Instagram</p></a>
              </li>
              <li>
                <p class="social-rede">Whatsapp</p>
                <a href="" target="_blank"><p class="social-name">wa.mi/+5590000-0000</p></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-pane fade" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
          <div class="container my-4">
            <h2 class="title-tab">Sobre - Mariana Costa</h2>
            <div class="sobre-user">
              <p>
                Mariana Costa é uma artesã apaixonada por moda sustentável. Ela transforma tecidos reaproveitados e materiais recicláveis em bolsas e acessórios de alta qualidade e estilo. Seu trabalho é uma combinação perfeita de criatividade e responsabilidade ambiental, trazendo uma nova perspectiva para o mundo da moda.
              </p>
              <p>
                Mariana acredita que cada peça criada tem o poder de contar uma história, ao mesmo tempo em que contribui para a preservação do meio ambiente. Suas criações são elegantes, únicas e feitas para pessoas que valorizam o estilo consciente e o consumo responsável.
              </p>
              <p>
                Com um olhar inovador, Mariana transforma o que seria descartado em peças de moda que são verdadeiras obras de arte. Ao escolher uma peça dela, você está apoiando a economia circular e promovendo um futuro mais sustentável.
              </p>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="avaliacoes" role="tabpanel" aria-labelledby="avaliacoes-tab">
          <div class="container my-4">
            <h2 class="title-tab">Avaliações</h2>
            <div class="border-bottom pb-4 mb-4">
              <p class="mb-1">
                Comprei uma bolsa feita pela Mariana e fiquei impressionada com a qualidade e o design. Saber que é feita com materiais recicláveis me deixa ainda mais feliz em usá-la todos os dias!
              </p>
              <div class="d-flex align-items-center mb-3">
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
            <div class="border-bottom pb-4">
              <p class="mb-1">
                Comprei uma bolsa feita pela Mariana e fiquei impressionada com a qualidade e o design. Saber que é feita com materiais recicláveis me deixa ainda mais feliz em usá-la todos os dias!
              </p>
              <div class="d-flex align-items-center mb-3">
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
    </div>
  </section>
@endsection

