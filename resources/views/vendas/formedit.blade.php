@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Alterar venda</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>


    <form class="form-control" method="post" action="{{ route('vendas.update', $venda->id)  }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <div class="mb-3">
                    <label for="venda" class="form-label">Venda</label>
                    <input type="text" disabled class="form-control @error('venda')  is-invalid @enderror" id="venda" name="venda" value="{{ $venda->venda }}" placeholder="Nome">
                    @if($errors->has('venda'))
                        <div class="invalid-feedback">{{ $errors->first('venda') }}</div>
                    @endif

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select class="form-select" aria-label="Selecione" name="cliente_id">
                        <option>Clique para selecionar</option>
                        @foreach($clientes as $cliente)
                        <?php
                            $status = '';
                            if ($cliente->id == $venda->cliente_id) $status="selected=selected";
                        ?>
                        <option {{$status}} value="{{$cliente->id}}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cliente_id'))
                        <div class="invalid-feedback">{{ $errors->first('cliente_id') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="mb-3">
                    <label for="produto_id" class="form-label">Produto</label>
                    <select class="form-select" aria-label="Selecione" name="produto_id">
                        <option selected>Clique para selecionar</option>
                        @foreach($produtos as $produto)
                        <?php
                           $status = '';
                           if ($produto->id == $venda->produto_id) $status="selected=selected";
                        ?>
                        <option {{$status}} value="{{$produto->id}}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('produto'))
                        <div class="invalid-feedback">{{ $errors->first('produto') }}</div>
                    @endif

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"> Salvar</button>
        <a href=" {{ URL::previous() }} " type="submit" class="btn btn-warning"> Voltar</a>
    </form>
@endsection