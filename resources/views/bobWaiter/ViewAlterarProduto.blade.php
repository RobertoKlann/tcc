@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Alterar Produto</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach($pro as $oPro): ?>
                <form role="form" action="{{ url('bobWaiter/produto/update')}}" method="POST" id="form-alterar-produto">

                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-1">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo" value="{{ $oPro->prdcodigo }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="descricao" class="col-sm-3 col-form-label-sm label-right">Descrição:</label>
                        <div class="col-sm-3">
                            <input type="text" name="descricao" class="form-control input-small" id="descricao" value="{{ $oPro->prddescricao }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="preco" class="col-sm-3 col-form-label-sm label-right">Preco:</label>
                        <div class="col-sm-3">
                            <input type="text" name="preco" class="form-control input-small" id="descricao" value="{{ $oPro->prdpreco }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="sbccodigo" class="col-sm-3 col-form-label-sm label-right">Categoria:</label>
                        <div class="col-sm-3">
                            <select name="ctgcodigo" id="select-categoria-produto">

                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="estabelecimento" class="form-control input-small" id="estabelecimento">

                    <div class="form-group row justify-content-center mt-3">
                        <button type="submit" id="alterar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Confirmar</span>
                        </button>
                        <a href="{{ url('bobWaiter/produto') }}" id="cancelar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </div>
                    <input type="hidden" id="categoria-produto" value="{{$oPro->ctgcodigo}}">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <?php endforeach ?>
                <?php @stop ?>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/js/produto.js"></script>
@endsection