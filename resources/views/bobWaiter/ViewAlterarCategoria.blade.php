@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Alterar Categoria</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach($cat as $oCat): ?>
                <form role="form" action="{{ url('bobWaiter/categoria/update')}}" method="POST" id="form-alterar-categoria">
                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-1">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo" value="{{$oCat->ctgcodigo }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="descricao" class="col-sm-3 col-form-label-sm label-right">Descrição:</label>
                        <div class="col-sm-3">
                            <input type="text" name="descricao" class="form-control input-small" id="descricao" value="{{$oCat->ctgdescricao}}">
                        </div>
                    </div>

                    <input type="hidden" name="estabelecimento" class="form-control input-small" id="estabelecimento" value="{{$oCat->estcodigo}}">
                    <div class="form-group row justify-content-center mt-3">
                        <button type="submit" id="alterar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Confirmar</span>
                        </button>
                        <a href="{{ url('bobWaiter/categoria/') }}" id="cancelar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </div>
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
    <script src="/js/categoria.js"></script>
@endsection