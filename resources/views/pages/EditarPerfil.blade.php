@extends('layouts.app')
@section('title', 'Editar Perfil')

@section('styles')
    <link rel="stylesheet" href="/assets/css/editarperfil.css">
@endsection

@section('content')
<div class="container container-editar">
        <h2>Editar Perfil</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $user->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $user->instagram) }}">
            </div>

            <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}">
            </div>

            <div class="form-group">
                <label for="profile_image">Imagem de Perfil:</label>
                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                @if($user->profile_image)
                    <img src="{{ $user->profile_image }}" alt="Imagem de Perfil" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <div class="form-group">
                <label for="banner_image">Imagem de Banner:</label>
                <input type="file" class="form-control-file" id="banner_image" name="banner_image">
                @if($user->banner_image)
                    <img src="{{ $user->banner_image }}" alt="Imagem de Banner" class="img-thumbnail mt-2" width="300">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('user.profile') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    </div>
@endsection



