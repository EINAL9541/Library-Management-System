<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/b440f051d3.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    

    <style>
        td {
            text-align: center;
            align-items: center;
        }

      
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url("/list/all")}}" class="nav-link">Home</a>
                </li>

            </ul>



          
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">A Library</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('book-table')}}" class="nav-link {{ (request()->is('admin/book-table')) ? 'active' : '' }}">

                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Book Table
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('author-table')}}" class="nav-link {{ (request()->is('admin/author-table')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Author Table
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('category-table')}}" class="nav-link {{ (request()->is('admin/category-table')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Category Table
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('member-table')}}" class="nav-link {{ (request()->is('admin/member-table')) ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-users-rays"></i>
                                <p>
                                    Member Table
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('issue-table')}}" class="nav-link {{ (request()->is('admin/issue-table')) ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-bookmark"></i>
                                <p>
                                    Issue Table
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{route('return-table')}}" class="nav-link {{ (request()->is('admin/return-table')) ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-book-bookmark"></i>
                                <p>
                                    Return Table
                                </p>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>