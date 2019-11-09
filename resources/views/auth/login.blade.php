<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/index.css" media="screen" />
        <link href="/css/all.min.css" type="text/css" rel="stylesheet">
        <link href="/css/login.css" type="text/css" rel="stylesheet">

        <title>Conecte-se</title>
    </head>
    <body id="page-top">
        <div class="sidenav">
                <div class="login-main-text">
                    <h2>Bob Waiter Login</h2>
                    <p>Faça o login para obter acesso à aplicação.</p>
                </div>
            </div>
            <div class="main">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">
                        <form action="login" method="post" id="form-login">
                            <div class="form-group has-feedback input-login">
                                <input type="text" name="email" class="form-control" placeholder="Informe seu email">
                            </div>
                            <div class="form-group has-feedback input-login">
                                <input type="password" name="password" class="form-control" placeholder="Informe sua senha">
                            </div>
                            <button type="submit" class="btn btn-black">Entrar</button>

                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                    <br>
                    @if(Session::has('loginFails'))
                        <p class="alert {{ Session::get('alertClass', 'alert-info') }}">{{ Session::get('loginFails') }}</p>
                    @endif
                </div>
        </div>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script src="https://kit.fontawesome.com/67c671c2e1.js"></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script>
        
    </body>
</html>