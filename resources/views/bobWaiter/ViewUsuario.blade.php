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
<a href="{{ url('bobWaiter/usuario/create') }}" name="incluirUsuario" class="btn btn-primary btn-icon-split btn-sm">
    <span class="icon text-white-50">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Incluir</span>
</a>
<table class="table table-striped">
    <thead class="thead-blue">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Endereço</th>
        <th scope="col">Bairro</th>
        <th scope="col">Cidade</th>
        <th scope="col">Estado</th>
        <th scope="col">Telefone</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach($usuarios as $oUsuario): ?>
        <tr>
            <td><?= $oUsuario->usucodigo ?></td>
            <td><?= $oUsuario->usunome ?></td>
            <td><?= $oUsuario->usucpf ?></td>
            <td><?= $oUsuario->usuendereco ?></td>
            <td><?= $oUsuario->usubairro ?></td>
            <td><?= $oUsuario->usucidade ?></td>
            <td><?= $oUsuario->usuestado ?></td>
            <td><?= $oUsuario->usutelefone ?></td>
            <td><?= $oUsuario->usustatus ?></td>
            <td>
                <a id="anchorAlterar" class="anchor-icons" href="{{ url('bobWaiter/usuario/edit/' . $oUsuario->usucodigo) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="anchor-icons" name="excluirUsuario" value="{{ $oUsuario->usucodigo }}" style="cursor: pointer;">
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
    <script src="/js/usuario.js"></script>
@endsection