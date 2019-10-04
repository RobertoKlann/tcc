@extends('bobWaiter/ViewNav')

@section('title', 'Bob Waiter')

@section('css')

@endsection
@section('page-content')

<div class="card border-primary mb-3 card-pedido" style="max-width: 18rem; max-height: 17rem;">
    <div class="card-header">Pedido - 01</div>
        <div class="card-body text-primary">
            <h5 class="card-title">Mesa - 01</h5>
            <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
        </div>
    </div>
    <div class="card border-secondary mb-3 card-pedido" style="max-width: 18rem; max-height: 17rem;">
    <div class="card-header">Pedido - 02</div>
    <div class="card-body text-secondary">
        <h5 class="card-title">Mesa - 02</h5>
        <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    </div>
    </div>
    <div class="card border-success mb-3 card-pedido" style="max-width: 18rem; max-height: 17rem;">
    <div class="card-header">Pedido - 03</div>
    <div class="card-body text-success">
        <h5 class="card-title">Mesa - 03</h5>
        <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    </div>
    </div>
    <div class="card border-danger mb-3 card-pedido" style="max-width: 18rem; max-height: 17rem;">
    <div class="card-header">Pedido - 04</div>
    <div class="card-body text-danger">
        <h5 class="card-title">Mesa - 04</h5>
        <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    </div>
</div>
<button type="button" class="btn btn-primary btn-lg btn-loader"><a class="anchor-refresh" href="/ViewInicial">Recarregar</a></button>

@endsection

@section('scripts')

@endsection