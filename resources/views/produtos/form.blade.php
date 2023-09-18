@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>


<form class="form-control" method="post" action="{{ route('produto.gravar') }}">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control @error('nome')  is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Nome do produto">
        @if($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        @endif

    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="text" class="form-control @error('valor')  is-invalid @enderror" id="valor" name="valor"  value="{{ old('valor') }}" placeholder="Valor">
        @if($errors->has('valor'))
            <div class="invalid-feedback">{{ $errors->first('valor') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control @error('descricao')  is-invalid @enderror" id="descricao" name="descricao"   value="{{ old('descricao') }}" rows="3"></textarea>
        @if($errors->has('descricao'))
            <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-success"> Cadastrar</button>
    <a href=" {{ URL::previous() }} " type="submit" class="btn btn-danger"> Cancelar</a>
</form>
@endsection