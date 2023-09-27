<form class="form-control" method="post" action="{{ route('clientes.update', $cliente->id)  }}">
    <div class="modal fade" id="modaledit{{$cliente->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('nome')  is-invalid @enderror" id="nome" name="nome" value="{{ $cliente->nome }}" placeholder="Nome">
                                @if($errors->has('nome'))
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control @error('email')  is-invalid @enderror" id="email" name="email"  value="{{ $cliente->email }}" placeholder="E-mail">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                            <div class="mb-3">
                                <label for="cep" class="form-label">Cep</label>
                                <input type="text" class="form-control @error('cep')  is-invalid @enderror" id="cep2" name="cep" value="{{ $cliente->cep }}" placeholder="Cep">
                                @if($errors->has('cep'))
                                    <div class="invalid-feedback">{{ $errors->first('cep') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                            <div class="mb-3">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" class="form-control @error('logradouro')  is-invalid @enderror" id="logradouro" name="logradouro" value="{{ $cliente->logradouro }}" placeholder="Logradouro">
                                @if($errors->has('logradouro'))
                                    <div class="invalid-feedback">{{ $errors->first('logradouro') }}</div>
                                @endif

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control @error('endereco')  is-invalid @enderror" id="endereco" name="endereco"  value="{{ $cliente->endereco }}" placeholder="Endereço">
                                @if($errors->has('endereco'))
                                    <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="mb-3">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control @error('bairro')  is-invalid @enderror" id="bairro" name="bairro"  value="{{ $cliente->bairro }}" placeholder="Bairro">
                                @if($errors->has('bairro'))
                                    <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> Gravar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>