@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <form action="{{ route('clientes.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome">
            <button>Pesquisar</button>

        </form>
    </div>
</div>
    <div>
        <a type="button" href="{{ route('clientes.create') }}" class="btn btn-success">Incluir Cliente</a>
    </div>
    <hr>
    <div>
        <div class="table-responsive mt-4">
            @if($clientes->isEmpty())
                <h6> Não encontrou nenhuma informação pesquisada. </h6>
            @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Endereco</th>
                        <th scope="col">Adicionado</th>
                        <th scope="col">Atualizado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes  as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ substr(strip_tags($cliente->endereco), 0, 80) }}</td>
                        <td>{{ date_format($cliente->created_at, 'd-m-Y') }}</td>
                        <td>{{ date_format($cliente->updated_at, 'd-m-Y') }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-light  btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>

                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistro(  ' {{ route('clientes.destroy',  $cliente) }} ', {{ $cliente->id }} ) " class="btn btn-danger btn-sm">
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
                {!! $clientes->links() !!}
            </div>

            @endif
        </div>
    </div>
@endsection