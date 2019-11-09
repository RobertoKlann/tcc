@extends('bobWaiter/ViewNav')

@section('title', 'Bob Waiter')

@section('css')

@endsection
@section('page-content')
@if (Auth::user()->usutipo != 1)
<div class="row" style="justify-content: center;">
    <div class="card card-pedido card-detalhe-pedido container-pedido-produzido">
        <div class="card-body card-body-pedido">
            <h6 class="card-title font-weight-bold">Pedido 01</h6>
            <p class="p-card-detalhe-mesa">Status: Finalizado</p>
            <p class="p-card-detalhe-mesa">Pago: Não</p>
            <p class="p-card-detalhe-mesa">Usuário: William Tiago</p>
        </div>
    </div>

    <div class="card card-pedido card-detalhe-pedido container-pedido-disponivel">
        <div class="card-body card-body-pedido">
            <h6 class="card-title font-weight-bold">Pedido 02</h6>
            <p class="p-card-detalhe-mesa">Status: Entregue</p>
            <p class="p-card-detalhe-mesa">Pago: Sim</p>
            <p class="p-card-detalhe-mesa">Usuário: Roberto Klann</p>
        </div>
    </div>

    <div class="card card-pedido card-detalhe-pedido container-pedido-producao">
        <div class="card-body card-body-pedido">
            <h6 class="card-title font-weight-bold">Pedido 03</h6>
            <p class="p-card-detalhe-mesa">Status: Em produção</p>
            <p class="p-card-detalhe-mesa">Pago: Não</p>
            <p class="p-card-detalhe-mesa">Usuário: Deivid Jeferson</p>
        </div>
    </div>

    <div class="card card-pedido card-detalhe-pedido container-pedido-disponivel">
        <div class="card-body card-body-pedido">
            <h6 class="card-title font-weight-bold">Pedido 04</h6>
            <p class="p-card-detalhe-mesa">Status: Entregue</p>
            <p class="p-card-detalhe-mesa">Pago: Sim</p>
            <p class="p-card-detalhe-mesa">Usuário: Lucas Gustavo</p>
        </div>
    </div>

    <div class="card card-pedido card-detalhe-pedido container-pedido-produzido">
        <div class="card-body card-body-pedido">
            <h6 class="card-title font-weight-bold">Pedido 05</h6>
            <p class="p-card-detalhe-mesa">Status: Finalizado</p>
            <p class="p-card-detalhe-mesa">Pago: Não</p>
            <p class="p-card-detalhe-mesa">Usuário: Ivan Bonetti</p>
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')

@endsection