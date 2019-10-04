<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Roberto Klann">

        <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">

        @yield('css')
    </head>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('bobWaiter/home') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-user-ninja"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">BOB Waiter</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    ROTINAS
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/home') }}">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span></a>
                </li>

                @if (Auth::user()->usutipo == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/estabelecimento') }}">
                        <i class="fas fa-utensils"></i>
                        <span>Estabelecimento</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/estabelecimento/categoria') }}">
                        <i class="fas fa-tasks"></i>
                        <span>Categoria estabelecimento</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/categoria') }}">
                        <i class="fas fa-bars"></i>
                        <span>Categoria</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/produto') }}">
                        <i class="fas fa-hotdog"></i>
                        <span>Produto</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/usuario') }}">
                        <i class="fa fa-users fa-lg"></i>
                        <span>Usuário</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/categoria') }}">
                        <i class="fas fa-bars"></i>
                        <span>Categoria</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/produto') }}">
                        <i class="fas fa-hotdog"></i>
                        <span>Produto</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('bobWaiter/mesa') }}">
                        <i class="fas fa-table"></i>
                        <span>Mesa</span></a>
                </li>
                @endif

                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <li class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" id="dropdown-profile" data-toggle="dropdown">
                                @if (Auth::check())
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->usunome }}</span>
                                @else
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuário</span>
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" id="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </nav>
                    <div class="container-fluid">
                        @yield('page-content')
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Roberto Klann 2019</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div style="display: none;" id="active-layer">@yield('active-layer')</div>

        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/template/js/sb-admin-2.min.js"></script>
        <script src="/js/axios.js"></script>
        <script src="/js/sweetAlert.js"></script>
        <script src="/js/jquery.mask.min.js"></script>
        <script type="text/javascript">

            $(window).on('load', () => {
                $('#logout').on('click', onClickLogout);
            });

            function onClickLogout() {
                window.location.href = "{{ url('auth/logout') }}";
            }

        </script>
        @yield('scripts')
    </body>

</html>