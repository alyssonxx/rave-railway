@extends('layouts.app')
@section('title', 'Meu Perfil')

@section('styles')
  <link rel="stylesheet" href="/assets/css/paginaUsuario.css">
@endsection

@section('content')
  <section class="header">
    <div class="container">
      <div class="header-perfil">
        <div class="banner-perfil" style="background-image: url('<?= (!empty($user->banner_image) ? $user->banner_image : '/assets/images/banner-example.jpg' );?>');"></div>
        <div class="user-info">
          <div class="photo-profile">
            <img src="<?= (!empty($user->profile_image) ? $user->profile_image : '/assets/images/profile-example.jpg' );?>" alt="">
            <a class="editar-perfil" href="{{route('user.edit')}}">?</a>
          </div>
          <div class="text-profile">
            <h2 class="name"><?= (!empty($user->name) ? $user->name : 'Sem nome' );?></h2>
            <p class="description"><?= (!empty($user->descricao) ? $user->descricao : 'Sem descrição' );?></p>
          </div>
          
          <span class="divider"></span>
          <div class="redes-user">
            <p class="text">Formas de Contato</p>
            <div class="redes">
              <?= (!empty($user->email) ? "<img src='/assets/images/icones/mail.svg'>" : '' );?>
              <?= (!empty($user->instagram) ? "<img src='/assets/images/icones/instagram.svg'>" : '' );?>
              <?= (!empty($user->whatsapp) ? "<img src='/assets/images/icones/whatsapp.svg'>" : '' );?>
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
          <a class="nav-link active" id="galeria-tab" data-bs-toggle="tab" href="#galeria-{{$user->id}}" role="tab"
            aria-controls="galeria" aria-selected="true">Galeria</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contato-tab" data-bs-toggle="tab" href="#contato-{{$user->id}}" role="tab" aria-controls="contato"
            aria-selected="false">Contato</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="sobre-tab" data-bs-toggle="tab" href="#sobre-{{$user->id}}" role="tab" aria-controls="sobre"
            aria-selected="false">Sobre o Artesão</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="avaliacoes-tab" data-bs-toggle="tab" href="#avaliacoes-{{$user->id}}" role="tab"
            aria-controls="avaliacoes" aria-selected="false">Avaliações</a>
          </li>
        </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="galeria-{{$user->id}}" role="tabpanel" aria-labelledby="galeria-tab">
          <div class="container my-4 galery-content">
            <div class="row">
              @foreach ($produtos as $produto )
                <div class='col-md-4 card-produto'>
                  <a href="{{ route('pages.paginaproduto', $produto->id) }}" class='card-img'>
                      <img src='{{ $produto->imagem }}' class='card-img-top' alt='Produto 1'>
                      <div class='hover-text'>
                      <p class='hover-title'>{{ $produto->nomeP }}</p>
                      <p class='hover-artesao'>{{ $produto->descP  }}</p>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contato-{{$user->id}}" role="tabpanel" aria-labelledby="contato-tab">
          <div class="content-contato">
            <h2 class="title-tab">Formas de contato</h2>
            <ul class="list-social">
              <li>
                <p class="social-rede">Email</p>
                <a href="mailto:{{$user->email}}"><p class="social-name"><?= (!empty($user->email) ? $user->email : 'Sem email' );?></p></a>
              </li>
              <li>
                <p class="social-rede">Instagram</p>
                <a href="" target="_blank"><p class="social-name"><?= (!empty($user->instagram) ? $user->instagram : 'Sem instagram' );?></p></a>
              </li>
              <li>
                <p class="social-rede">Whatsapp</p>
                <a href="" target="_blank"><p class="social-name"><?= (!empty($user->whatsapp) ? "wa.me/+" . $user->whatsapp : 'Sem whatsapp' );?></p></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-pane fade" id="sobre-{{$user->id}}" role="tabpanel" aria-labelledby="sobre-tab">
          <div class="container my-4">
            <h2 class="title-tab">Sobre - <?= (!empty($user->name) ? $user->name : 'Sem nome' );?></h2>
            <div class="sobre-user">
              <p><?= (!empty($user->descricao) ? $user->descricao : 'Sem descricao' );?></p>
            </div>
          </div>


        </div>
        <div class="tab-pane fade" id="avaliacoes-{{$user->id}}" role="tabpanel" aria-labelledby="avaliacoes-tab">
        <div class="container my-4">
          
          <h2 class="title-tab">Comentários</h2>
          @foreach($comentarios as $comentario) 
            <div class="border-bottom pt-2 mb-4">
              <p class="mb-1">
              <?= (!empty($comentario->comentario) ? $comentario->comentario : 'Comentario vazio' );?>
              </p>

            </div>
          @endforeach
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
@endsection

