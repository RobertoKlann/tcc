@extends('ViewNav')
<div></div>
@section('content')

<table class="table table-striped">
    <thead class="thead-dark">
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
            <td><?= $oUsuario->usucpfcnpj ?></td>            
            <td><?= $oUsuario->usuendereco ?></td>
            <td><?= $oUsuario->usubairro ?></td>
            <td><?= $oUsuario->usucidade ?></td>
            <td><?= $oUsuario->usuestado ?></td>
            <td><?= $oUsuario->usutelefone ?></td>
            <td><?= $oUsuario->usustatus ?></td>
            <td>
                <a class="anchor-icons" href="#">
                    <i class="fas fa-edit""></i>
                </a>
                <a class="anchor-icons" href="">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?php @stop ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection