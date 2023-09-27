@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>



    <div class="row" style="display: flex">
        <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-right: 10px">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Success card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <img src="">
            </div>
        </div>
        <div class="card border-success mb-3" style="max-width: 18rem; margin-right: 10px">
            <div class="card-header">Produtos</div>
            <div class="card-body text-success">
                <h5 class="card-title">Produtos</h5>
                <a href="{{ route('produtos') }}" class="btn btn-primary">{{ $produtos }}</a>
            </div>
        </div>
        <div class="card text-bg-warning mb-3" style="max-width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Total: </p>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">{{ $clientes }}</a>
            </div>
        </div>
        <div class="card text-bg-info mb-3" style="max-width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Vendas</h5>
                <p class="card-text">Total: </p>
                <a href="{{ route('vendas.index') }}" class="btn btn-primary">{{ $vendas }}</a>
            </div>
        </div>
    </div>
@endsection