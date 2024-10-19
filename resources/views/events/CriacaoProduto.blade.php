@extends('layouts.app')
@section('title', 'MarketPlace')

@section('styles')
    <link rel="stylesheet" href="/assets/css/criacaoProduto.css">
@endsection


@section('content')
    <div class="produto-content container">
        <div class="title-page">
            <h1>Criação de produto</h1>
            <span class="divider"></span>
            <p>Compartilhe sua criatividade e contribua para um futuro mais verde!</p>
        </div>

        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data"
            class="form-validate is-alter row">
            @csrf
            <div class="form-group col-sm-12">
                <label class="form-label" for="nome-produto">Nome do produto</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg" name="nomeP" id="nomeP" required>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label class="form-label" for="desc-produto">Descrição do produto</label>
                <div class="form-control-wrap">
                    <textarea class="form-control" style="width: 100%" name="descP" id="descP" required></textarea>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label class="form-label" for="preco-produto">Preço</label>
                <div class="form-control-wrap">
                    <input type="number" class="form-control form-control-lg" name="precoP" id="precoP" required>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <div class="form-control-wrap">
                    <label for="img-produto">Imagem do produto</label>
                    <input type="file" class="form-control-file" name="imagem" id="image-produto">
                </div>
            </div>

            <div class="form-group col-sm-12">
                <input type="submit" class="btn btn-green btn-lg btn-primary btn-block" value="Cadastrar">
            </div>
        </form>
    </div>
@endsection
