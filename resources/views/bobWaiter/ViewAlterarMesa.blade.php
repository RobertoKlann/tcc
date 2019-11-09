@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Alterar Mesa</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach($mesa as $oMesa): ?>
                <form role="form" action="{{ url('bobWaiter/mesa/update')}}" method="POST" id="form-alterar-mesa">
                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-1">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo" value="{{$oMesa->msacodigo}}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="qtdlugares" class="col-sm-3 col-form-label-sm label-right">Qtde. Lugares:</label>
                        <div class="col-sm-1">
                            <input type="number" name="qtdlugares" class="form-control input-small" id="qtdlugares" value="{{$oMesa->msaqtdlugares}}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="situacao" class="col-sm-3 col-form-label-sm label-right">Situação:</label>
                        <div class="col-sm-3">
                            <select name="situacao">
                                <option value="1">Disponível</option>
                                <option value="0">Ocupada</option>
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
                        <a href="{{ url('bobWaiter/mesa') }}" id="cancelar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </div>
                    <input type="hidden" name="situacao-alterar" value="{{$oMesa->msasituacao}}">
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
<script src="/js/mesa.js"></script>
@endsection