@extends('layouts.app')
@section('title', 'Página de usuario')

@section('styles')
  <link rel="stylesheet" href="/assets/css/paginaUsuario.css">
@endsection

@section('content')

<section class="header">
    <div class="container">
      <div class="header-perfil">
        <div class="banner-perfil" style="background-image: url('<?= (!empty($dadosVendedor->banner_image) ? $dadosVendedor->banner_image : '/assets/images/banner-example.jpg' );?>');"></div>
        <div class="user-info">
          <div class="photo-profile">
            <img src="<?= (!empty($dadosVendedor->profile_image) ? $dadosVendedor->profile_image : '/assets/images/profile-example.jpg' );?>" alt="">
            <a class="editar-perfil" href="{{route('user.edit')}}">?</a>
          </div>
          <div class="text-profile">
            <h2 class="name"><?= (!empty($dadosVendedor->name) ? $dadosVendedor->name : 'Sem nome' );?></h2>
            <p class="description"><?= (!empty($dadosVendedor->descricao) ? $dadosVendedor->descricao : 'Sem descrição' );?></p>
          </div>
          
          <span class="divider"></span>
          <div class="redes-user">
            <p class="text">Formas de Contato</p>
            <div class="redes">
              <?= (!empty($dadosVendedor->email) ? "<img src='/assets/images/icones/mail.svg'>" : '' );?>
              <?= (!empty($dadosVendedor->instagram) ? "<img src='/assets/images/icones/instagram.svg'>" : '' );?>
              <?= (!empty($dadosVendedor->whatsapp) ? "<img src='/assets/images/icones/whatsapp.svg'>" : '' );?>
            </div>
          </div>
          <a class="editar class" href="{{route('produto.create')}}">Adicionar Produto</a>
        </div>
      </div>
    </div>
  </section>
  <section class="section-content-perfil">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="galeria-tab" data-bs-toggle="tab" href="#galeria-{{$dadosVendedor->id}}" role="tab"
            aria-controls="galeria" aria-selected="true">Galeria</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contato-tab" data-bs-toggle="tab" href="#contato-{{$dadosVendedor->id}}" role="tab" aria-controls="contato"
            aria-selected="false">Contato</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="sobre-tab" data-bs-toggle="tab" href="#sobre-{{$dadosVendedor->id}}" role="tab" aria-controls="sobre"
            aria-selected="false">Sobre o Artesão</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="avaliacoes-tab" data-bs-toggle="tab" href="#avaliacoes-{{$dadosVendedor->id}}" role="tab"
            aria-controls="avaliacoes" aria-selected="false">Avaliações</a>
          </li>
        </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="galeria-{{$dadosVendedor->id}}" role="tabpanel" aria-labelledby="galeria-tab">
          <div class="container my-4 galery-content">
            <div class="row">
              @foreach ($dadosProdutos as $dadosProduto)
                <div class='col-md-4 card-produto'>
                  <a href="{{ route('pages.paginaproduto', $dadosProduto->id) }}" class='card-img'>
                      <img src='{{ $dadosProduto->imagem }}' class='card-img-top' alt='Produto'>
                      <div class='hover-text'>
                      <p class='hover-title'>{{ $dadosProduto->nomeP }}</p>
                      <p class='hover-artesao'>{{ $dadosProduto->descP  }}</p>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contato-{{$dadosVendedor->id}}" role="tabpanel" aria-labelledby="contato-tab">
          <div class="content-contato">
            <h2 class="title-tab">Formas de contato</h2>
            <ul class="list-social">
              <li>
                <p class="social-rede">Email</p>
                <a href="mailto:{{$dadosVendedor->email}}"><p class="social-name"><?= (!empty($dadosVendedor->email) ? $dadosVendedor->email : 'Sem email' );?></p></a>
              </li>
              <li>
                <p class="social-rede">Instagram</p>
                <a href="" target="_blank"><p class="social-name"><?= (!empty($dadosVendedor->instagram) ? $dadosVendedor->instagram : 'Sem instagram' );?></p></a>
              </li>
              <li>
                <p class="social-rede">Whatsapp</p>
                <a href="" target="_blank"><p class="social-name"><?= (!empty($dadosVendedor->whatsapp) ? "wa.me/+" . $dadosVendedor->whatsapp : 'Sem whatsapp' );?></p></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-pane fade" id="sobre-{{$dadosVendedor->id}}" role="tabpanel" aria-labelledby="sobre-tab">
          <div class="container my-4">
            <h2 class="title-tab">Sobre - <?= (!empty($dadosVendedor->name) ? $dadosVendedor->name : 'Sem nome' );?></h2>
            <div class="sobre-user">
              <p><?= (!empty($dadosVendedor->descricao) ? $dadosVendedor->descricao : 'Sem descricao' );?></p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="avaliacoes-{{$dadosVendedor->id}}" role="tabpanel" aria-labelledby="avaliacoes-tab">
          <div class="container my-4">
          
            <h2 class="title-tab">Comentários</h2>
            <form class="comenteario-box" action="{{ route('perfil.armazenarcomentario', $dadosVendedor->id) }}" method="POST">
                @csrf
                <textarea name="comentario" required></textarea>
                <button type="submit">Comentar</button>
            </form>
            @foreach($comentarios as $comentario) 
              <div class="border-bottom pt-2 mb-4">
                <p class="mb-1">
                <?= (!empty($comentario->comentario) ? $comentario->comentario : 'Comentario vazio' );?>
                </p>
                <div class="d-flex align-items-center mb-3">
                  <span class="text-muted" style="font-style: italic;"> {{ $comentario->usuario->name }}</span>    
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
@endsection

