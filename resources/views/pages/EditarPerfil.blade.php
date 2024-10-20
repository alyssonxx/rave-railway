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
        
        <form action="{{ route('user.edit', $user->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usado para simular um PUT na rota -->
            
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email_verified_at">Email Verificado em:</label>
                <input type="text" class="form-control" id="email_verified_at" name="email_verified_at" value="{{ old('email_verified_at', $user->email_verified_at) }}" readonly>
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

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="#" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection



