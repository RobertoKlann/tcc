@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Cadastro de Estabelecimento</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('bobWaiter/estabelecimento/store')}}" method="POST" id="form-incluir-est">
                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-1">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo">
                        </div>
                    </div>

                    <div class="row">
                        <label for="nomerazao" class="col-sm-3 col-form-label-sm label-right">Nome/Razão:</label>
                        <div class="col-sm-4">
                            <input type="text" name="nomerazao" class="form-control input-small" id="nomerazao">
                        </div>
                    </div>

                    <div class="row">
                        <label for="endereco" class="col-sm-3 col-form-label-sm label-right">Endereço:</label>
                        <div class="col-sm-4">
                            <input type="text" name="endereco" class="form-control input-small" id="endereco">
                        </div>
                    </div>

                    <div class="row">
                        <label for="horario" class="col-sm-3 col-form-label-sm label-right">Horário:</label>
                        <div class="col-sm-2">
                            <input type="text" name="horario" class="form-control input-small" id="horario">
                        </div>
                    </div>

                    <div class="row">
                        <label for="descricao" class="col-sm-3 col-form-label-sm label-right">Categoria:</label>
                        <div class="col-sm-3">
                            <select id="select-cat-est" name="catcodigo">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mt-3">
                        <button type="submit" id="alterar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Confirmar</span>
                        </button>
                        <a href="{{ url('bobWaiter/estabelecimento') }}" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </div>

                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/js/estabelecimento.js"></script>
@endsection