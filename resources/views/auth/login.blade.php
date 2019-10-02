<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/index.css" media="screen" />
        <link href="/css/all.min.css" type="text/css" rel="stylesheet">
        <link href="/css/login.css" type="text/css" rel="stylesheet">

        <title>Login</title>
    </head>
    <body>
        <div class="sidenav">
            <div class="login-main-text">
                <h2>Bob Waiter</h2>
                <p>Faça login para entrar na aplicação.</p>
            </div>
        </div>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                <form action="login" method="POST">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-black">Entrar</button>
                    
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                </div>
            </div>
            <br>
            @if(Session::has('loginFails'))
                <p class="alert {{ Session::get('alertClass', 'alert-info') }}">{{ Session::get('loginFails') }}</p>
            @endif
        </div>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/67c671c2e1.js"></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script>
        
    </body>
</html>