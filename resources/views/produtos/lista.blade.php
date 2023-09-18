@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <form action="{{ route('produtos') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome">
            <button>Pesquisar</button>

        </form>
    </div>
</div>
    <div>
        <a type="button" href="{{ route('produto.novo') }}" class="btn btn-success">Incluir Produto</a>
    </div>
    <hr>
    <div>
        <div class="table-responsive mt-4">
            @if($produtos->isEmpty())
                <h6> Não encontrou nenhuma informação pesquisada. </h6>
            @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Adicionado</th>
                        <th scope="col">Atualizado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos  as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ substr(strip_tags($produto->descricao), 0, 80) }}</td>
                        <td>{{ 'R$ '. number_format( $produto->valor, 2, ',' , '.' ) }}</td>
                        <td>{{ date_format($produto->created_at, 'd-m-Y') }}</td>
                        <td>{{ date_format($produto->updated_at, 'd-m-Y') }}</td>
                        <td>
                            <a href="{{ route('produto.alterar', $produto->id) }}" class="btn btn-light  btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>

                            <meta name="csrf-token" content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistro( '{{route('produto.destroy')}}', {{ $produto->id }} )" class="btn btn-danger btn-sm">
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
                {!! $produtos->links() !!}
            </div>

            @endif
        </div>
    </div>
@endsection