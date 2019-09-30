@extends('ViewNav')
<div></div>
@section('content')


<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Descrição</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
  <tbody>
  <?php foreach($catest as $oCatEst): ?>
        <tr>
            <td><?= $oCatEst->ctecodigo ?></td>
            <td id="teste"><?= $oCatEst->ctedescricao ?></td>
            <td>
                <a id="anchorAlterar" data-toggle="modal" data-target="#modalAlteracao" class="anchor-icons" href="#sign_up" value="{{$oCatEst->ctecodigo}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="anchor-icons" href="{{action('ControllerCategoriaEstabelecimento@delete', $oCatEst->ctecodigo)}}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?php @stop ?>

<!-- Button trigger modal -->
<button type="button" name="incluir" class="btn btn-primary btn-loader btn-lg" data-toggle="modal" data-target="#exampleModalScrollable">
  Incluir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Incluir Categoria de Estabelecimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/ViewInicial/insere">
          <div class="form-group">
            <label for="codigo">Código</label>
            <input readonly type="number" name="codigo" class="form-control input-codigo" id="codigo" placeholder="01">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" class="form-control input-descricao" id="descricao" placeholder="Pizza">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAlteracao" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Alterar Categoria de Estabelecimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/ViewInicial/update">
          <div class="form-group">
            <label for="codigo">Código</label>
            <input readonly type="number" name="codigo" class="form-control input-codigo" id="codigo" placeholder="01">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" class="form-control input-descricao" id="descricao" placeholder="Pizza">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/categoriaestabelecimento.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@endsection