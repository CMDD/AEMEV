<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Admin| El Mán</title>
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport"
        />
        <link
            rel="stylesheet"
            href="/bower_components/bootstrap/dist/css/bootstrap.min.css"
        />
        <link
            rel="stylesheet"
            href="/bower_components/font-awesome/css/font-awesome.min.css"
        />
        <link
            rel="stylesheet"
            href="/bower_components/Ionicons/css/ionicons.min.css"
        />
        <link rel="stylesheet" href="/dist/css/AdminLTE.min.css" />
        <link rel="stylesheet" href="/dist/css/skins/skin-purple.min.css" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"
        />
        @stack('styles')
    </head>

    <body class="hold-transition skin-purple  sidebar-mini">
        <div class="wrapper" id="app">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>El Man</b>Está Vivo</span>
                </a>

                <!-- Header Navbar -->
                @include('partials.nav')
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            @include('partials.sidebar')
            <div class="content-wrapper">
                {{-- @yield('content') --}}
                <router-view></router-view>
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Admin
                </div>
                <!-- Default to the left -->
                <strong
                    >Copyright &copy; 2019
                    <a href="#">Centro Carismatico Minuto de Dios</a>.</strong
                >
                All rights reserved.
            </footer>
        </div>

        <!-- jQuery 3 -->
        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        @stack('scripts')
        <script src="/dist/js/adminlte.min.js"></script>
        <!-- CK Editor -->
        
        <script src="/js/app.js"></script>
    </body>
</html>
