@extends('bobWaiter/ViewNav')
@section('css')
@endsection

@section('page-content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<a href="{{ url('bobWaiter/produto/create') }}" name="incluirProduto" class="btn btn-primary btn-icon-split btn-sm">
    <span class="icon text-white-50">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Incluir</span>
</a>

<table class="table table-striped">
    <thead class="thead-blue">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Categoria Descrição</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach($produtos as $oProduto): ?>
        <tr>
            <td><?= $oProduto->prdcodigo ?></td>
            <td><?= $oProduto->prddescricao ?></td>
            <td><?= $oProduto->prdpreco ?></td>
            <td><?= $oProduto->ctgdescricao ?></td>
            <td>
                <a id="anchorAlterar" href="{{ url('bobWaiter/produto/edit/' . $oProduto->prdcodigo) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="anchor-icons" name="excluirProduto" value="{{$oProduto->prdcodigo}}" style="cursor: pointer;">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<input type="hidden" name="_method" value="POST">
<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

<?php @stop ?>

@endsection

@section('scripts')
    <script src="/js/produto.js"></script>
@endsection