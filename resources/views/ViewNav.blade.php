<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        @section('css')
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <script src="https://kit.fontawesome.com/67c671c2e1.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/index.css" media="screen" />
        <link href="/css/all.min.css" type="text/css" rel="stylesheet">

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/index.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="/js/bootstrap.js"></script>
        @show

        <title>Bob Waiter</title>
    </head>
    <body>
    <div class="container-home">
        <div class="nav-side-menu">
            <div class="brand">Painel de Controle</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>  
                <div class="menu-list">  
                    <ul id="menu-content" class="menu-content collapse out">
                        <li data-toggle="collapse" data-target="#products" class="collapsed">
                            <a href="/ViewInicial"><i class="fas fa-home"></i>Inicio</a>
                        </li>

                        <li data-toggle="collapse" data-target="#products" class="collapsed">
                            <a href="/ViewInicial/ViewEstabelecimento"><i class="fas fa-utensils"></i>Estabelecimentos</a>
                        </li>

                        <li data-toggle="collapse" data-target="#new" class="collapsed">
                            <a href="/ViewInicial/ViewCategoriaEstabelecimento"><i class="fas fa-tasks"></i>Categorias Estabelecimento</a>
                        </li>

                        <li data-toggle="collapse" data-target="#service" class="collapsed">
                            <a href="/ViewInicial/ViewCategoria"><i class="fas fa-bars"></i>Categorias</a>
                        </li>

                        <li data-toggle="collapse" data-target="#new" class="collapsed">
                            <a href="/ViewInicial/ViewSubCategoria"><i class="fas fa-list-ol"></i>Sub Categoria</a>
                        </li>

                        <li data-toggle="collapse" data-target="#new" class="collapsed">
                            <a href="/ViewInicial/ViewProduto"><i class="fas fa-hotdog"></i>Produtos</a>
                        </li>
                        
                        <li>
                        <a href="/ViewInicial/ViewMesa"><i class="fas fa-table"></i>Mesa</a>
                        </li>

                        <li>
                        <a href="/ViewInicial/ViewUsuario"><i class="fa fa-users fa-lg"></i> Usuários</a>
                        </li>
                    </ul>
            </div>
        </div>
        <!-- Conteudo da pagina -->
        <div class="container-conteudo">
            @yield('content')
        </div>
    </div>
    </body>
</html>