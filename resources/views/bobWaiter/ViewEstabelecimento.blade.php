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
<a href="{{ url('bobWaiter/estabelecimento/create') }}" name="incluirEstabelecimento" class="btn btn-primary btn-icon-split btn-sm">
    <span class="icon text-white-50">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Incluir</span>
</a>

<table class="table table-striped">
    <thead class="thead-blue">
        <tr>
        <th scope="col">Código Estabelecimento</th>
        <th scope="col">Nome/Razão</th>
        <th scope="col">Endereço</th>
        <th scope="col">Horário</th>
        <th scope="col">Descrição Categoria</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach($estabelecimento as $oEstabelecimento): ?>
        <tr>
        <td><?= $oEstabelecimento->estcodigo ?></td>
            <td><?= $oEstabelecimento->estnomerazao ?></td>
            <td><?= $oEstabelecimento->estendereco ?></td>
            <td><?= $oEstabelecimento->esthorario ?></td>
            <td><?= $oEstabelecimento->ctedescricao ?></td>
            <td>
                <a id="anchorAlterar" class="anchor-icons" href="{{ url('bobWaiter/estabelecimento/edit/' . $oEstabelecimento->estcodigo) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="anchor-icons" name="excluirEstabelecimento" value="{{ $oEstabelecimento->estcodigo }}" style="cursor: pointer;">
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
<script type="text/javascript" src="/js/estabelecimento.js"></script>
@endsection