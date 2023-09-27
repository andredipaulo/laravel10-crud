@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <form action="{{ route('vendas.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome">
            <button>Pesquisar</button>

        </form>
    </div>
</div>
    <div>
        <a type="button" href="{{ route('vendas.create') }}" class="btn btn-success">Incluir Venda</a>
    </div>
    <hr>
    <div>
        <div class="table-responsive mt-4">
            @if($vendas->isEmpty())
                <h6> Não encontrou nenhuma informação pesquisada. </h6>
            @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Adicionado</th>
                        <th scope="col">Atualizado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendas  as $venda)
                    <tr>
                        <td>{{ $venda->venda }}</td>
                        <td>{{ $venda->cliente->nome ?? "" }}</td>
                        <td>{{ $venda->produto->nome }}</td>
                        <td>{{ date_format($venda->created_at, 'd-m-Y') }}</td>
                        <td>{{ date_format($venda->updated_at, 'd-m-Y') }}</td>
                        <td>
                            <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-light  btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>

                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistro(  ' {{ route('vendas.destroy',  $venda) }} ', {{ $venda->id }} ) " class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Excluir
                            </a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>

            <div class="d-flex">
                {!! $vendas->links() !!}
            </div>

            @endif
        </div>
    </div>
@endsection