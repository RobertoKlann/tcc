@extends('bobWaiter/ViewNav')

@section('css')
@endsection

@section('page-content')

<div class="card shadow-lg">
    <div class="card-header header-paginas">
        <p class="m-0 font-weight-bold">Cadastro de Usuário</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('bobWaiter/usuario/store')}}" method="POST" id="form-incluir-usuario">
                    <div class="row">
                        <label for="codigo" class="col-sm-3 col-form-label-sm label-right">Código:</label>
                        <div class="col-sm-1">
                            <input readonly type="text" name="codigo" class="form-control input-small" id="codigo" required="true">
                        </div>
                    </div>

                    <div class="row">
                        <label for="nomerazao" class="col-sm-3 col-form-label-sm label-right">Nome:</label>
                        <div class="col-sm-4">
                            <input type="text" name="nomerazao" class="form-control input-small" id="nomerazao" required="true">
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-sm-3 col-form-label-sm label-right">Email:</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" class="form-control input-small" id="email" required="true">
                        </div>
                    </div>

                    <div class="row">
                        <label for="password" class="col-sm-3 col-form-label-sm label-right">Senha:</label>
                        <div class="col-sm-4">
                            <input type="password" name="password" class="form-control input-small" id="password" required="true">
                        </div>
                    </div>

                    <div class="row">
                        <label for="endereco" class="col-sm-3 col-form-label-sm label-right">Endereço:</label>
                        <div class="col-sm-3">
                            <input type="text" name="endereco" class="form-control input-small" id="endereco">
                        </div>
                    </div>

                    <div class="row">
                        <label for="bairro" class="col-sm-3 col-form-label-sm label-right">Bairro:</label>
                        <div class="col-sm-3">
                            <input type="text" name="bairro" class="form-control input-small" id="bairro">
                        </div>
                    </div>

                    <div class="row">
                        <label for="cidade" class="col-sm-3 col-form-label-sm label-right">Cidade:</label>
                        <div class="col-sm-3">
                            <input type="text" name="cidade" class="form-control input-small" id="cidade">
                        </div>
                    </div>

                    <div class="row">
                        <label for="estado" class="col-sm-3 col-form-label-sm label-right">Estado:</label>
                        <div class="col-sm-3">
                            <input type="text" name="estado" class="form-control input-small" id="estado">
                        </div>
                    </div>

                    <div class="row">
                        <label for="cpf" class="col-sm-3 col-form-label-sm label-right">CPF:</label>
                        <div class="col-sm-2">
                            <input type="text" name="cpf" class="form-control input-small mascaracpf" id="cpf" required="true">
                        </div>
                    </div>

                    <div class="row">
                        <label for="datanascimento" class="col-sm-3 col-form-label-sm label-right">Data Nascimento:</label>
                        <div class="col-sm-2">
                            <input type="text" name="datanascimento" class="form-control input-small mascaradata" id="datanascimento">
                        </div>
                    </div>

                    <div class="row">
                        <label for="telefone" class="col-sm-3 col-form-label-sm label-right">Telefone:</label>
                        <div class="col-sm-2">
                            <input type="text" name="telefone" class="form-control input-small mascaratelefone" id="telefone">
                        </div>
                    </div>

                    <div class="row">
                        <label for="tipo" class="col-sm-3 col-form-label-sm label-right">Tipo:</label>
                        <div class="col-sm-2">
                            <select name="tipo" id="tipoUsuario">
                                <option value="1">Administrador</option>
                                <option value="0">Usuário</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-sm-3 col-form-label-sm label-right">Status:</label>
                        <div class="col-sm-2">
                            <select name="status" id="status">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="tipo" class="col-sm-3 col-form-label-sm label-right">Estabelecimento:</label>
                        <div class="col-sm-2">
                            <select name="estcodigo" id="estcodigo">
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mt-3">
                        <button type="submit" id="alterar" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Confirmar</span>
                        </button>
                        <a href="{{ url('bobWaiter/usuario') }}" class="btn btn-primary btn-icon-split btn-sm">
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
<script src="/js/usuario.js"></script>
@endsection