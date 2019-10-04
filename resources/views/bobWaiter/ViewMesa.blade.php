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
<a href="{{ url('bobWaiter/mesa/create') }}" name="incluirMesa" class="btn btn-primary btn-icon-split btn-sm">
    <span class="icon text-white-50">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Incluir</span>
</a>

<table class="table table-striped">
    <thead class="thead-blue">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Qtde. Lugares</th>
        <th scope="col">Situação</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach($mesas as $oMesa): ?>
        <tr>
            <td><?= $oMesa->msacodigo ?></td>
            <td><?= $oMesa->msaqtdlugares ?></td>
            <td><?= $oMesa->msasituacao ?></td>
            <td>
                <a id="anchorAlterar" class="anchor-icons" href="{{ url('bobWaiter/mesa/edit/' . $oMesa->msacodigo) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="anchor-icons" name="excluirMesa" value="{{$oMesa->msacodigo}}" style="cursor: pointer;">
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
    <script src="/js/mesa.js"></script>
@endsection