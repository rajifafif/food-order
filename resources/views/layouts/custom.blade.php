<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="CbkLv5gqwm9mq18XPDyPmAio6D4eXXNDw5wxBskb">




    <title>
        Dashboard </title>




    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">



    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




    <meta name="theme-color" content="#000">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}">




</head>

<body class="sidebar-mini sidebar-collapse">


    <div class="wrapper">


        <nav class="main-header navbar
    navbar-expand
    navbar-white navbar-light">


            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </li>



            </ul>


            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>


            </ul>

        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <a href="'home" class="brand-link ">


                <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE"
                    class="brand-image img-circle elevation-3" style="opacity:.8">


                <span class="brand-text font-weight-light ">
                    <b>Admin</b>LTE
                </span>

            </a>


            <div class="sidebar">
                <nav class="pt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">

                        <li class="nav-item">

                            <a class="nav-link" href="dashboard">

                                <i class="fas fa-sign-in-alt "></i>

                                <p>
                                    Login

                                </p>

                            </a>

                        </li>
                    </ul>
                </nav>
            </div>

        </aside>


        <div class="content-wrapper ">


            <div class="content-header">
                <div class="container-fluid">
                    <h1>@yield('content_header')</h1>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script src='{{ asset('app.js') }}'></script>
</body>

</html>
