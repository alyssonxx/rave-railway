@extends('layouts.app')
@section('title', 'Página de Artesãos')

@section('styles')
    <link rel="stylesheet" href="/assets/css/artesoes.css">
@endsection

@section('content')
<div class="container container-artesoes">
    <h2 class="text-center mb-4">Artesãos em Destaque</h2>
    <div class="row">
        @foreach ($artesoes as $artesao)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= (!empty($artesao->profile_image) ? $artesao->profile_image : '/assets/images/profile-example.jpg' );?>" class="card-img-top" alt="Foto {{ $artesao->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artesao->name }}</h5>
                        <p class="card-text">{{ $artesao->descricao }}</p>
                        <a href="{{ route('pages.PaginaUsuario', $artesao->id) }}" class="btn btn-primary">Visualizar Perfil</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $artesoes->links() }} <!-- Isso irá renderizar os links de paginação -->
        </div>
    </div>
</div>
@endsection
