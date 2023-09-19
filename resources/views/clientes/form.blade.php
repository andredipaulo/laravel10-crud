@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo cliente</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>


<form class="form-control" method="post" action="{{ route('clientes.store') }}">
    @csrf

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control @error('nome')  is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Nome">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                @endif

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email')  is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}" placeholder="E-mail">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control @error('logradouro')  is-invalid @enderror" id="logradouro" name="logradouro" value="{{ old('logradouro') }}" placeholder="Logradouro">
                @if($errors->has('logradouro'))
                    <div class="invalid-feedback">{{ $errors->first('logradouro') }}</div>
                @endif

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control @error('endereco')  is-invalid @enderror" id="endereco" name="endereco"  value="{{ old('endereco') }}" placeholder="Endereço">
                @if($errors->has('endereco'))
                    <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="mb-3">
                <label for="cep" class="form-label">Cep</label>
                <input type="text" class="form-control @error('cep')  is-invalid @enderror" id="cep" name="cep"  value="{{ old('cep') }}" placeholder="Cep">
                @if($errors->has('cep'))
                    <div class="invalid-feedback">{{ $errors->first('cep') }}</div>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control @error('bairro')  is-invalid @enderror" id="bairro" name="bairro"  value="{{ old('bairro') }}" placeholder="Bairro">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success"> Cadastrar</button>
    <a href=" {{ URL::previous() }} " type="submit" class="btn btn-danger"> Cancelar</a>
</form>
@endsection