@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Cadastro de Categoria do Estabelecimento</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('bobWaiter/estabelecimento/categoria/store')}}" method="POST" id="form-incluir-cat-est">
                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-2">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo">
                        </div>
                    </div>
                    <div class="row">
                        <label for="descricao" class="col-sm-3 col-form-label-sm label-right">Descrição:</label>
                        <div class="col-sm-3">
                            <input type="text" name="descricao" class="form-control input-small" id="descricao">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mt-3">
                        <button type="submit" id="alterar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Confirmar</span>
                        </button>
                        <a href="{{ url('bobWaiter/estabelecimento/categoria') }}" class="btn btn-primary btn-icon-split btn-sm">
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
<script src="/js/categoriaestabelecimento.js"></script>
@endsection