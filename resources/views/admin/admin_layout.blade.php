<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Или-Или</title>

    <link href="{{asset('img/iliili.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{URL::to('/dashboard')}}" class="nav-link">Почетна</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Content Logo -->
        <a href="{{asset('/dashboard')}}" class="brand-link">
            <img src="{{asset('dist/img/ili-ili.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Или-Или</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{asset('/admin-profile')}}" class="d-block">{{\Illuminate\Support\Facades\Session::get('name','surname')}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=""></i>
                            <p>
                                За Нас
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to('/add-about')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додади Содржина</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-about')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Сите Содржини</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=""></i>
                            <p>
                                Издавачка Дејност
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to('/add-book')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додади Книга</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-book')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Сите Книги</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/add-author')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додади Автор</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-author')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Види ги сите автори</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/add-category')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додади Категорија</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-author')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Види ги сите категории</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=""></i>
                            <p>
                                Блог
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to('/add-career')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додади Блог</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-career')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Сите Блогови</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=""></i>
                            <p>
                                Купони
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{URL::to('/add-news')}}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Додели Купон</p><span class="right badge badge-danger" style="margin-right: -16px">Додади</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/all-news')}}" class="nav-link">
                                    <i class="far fa-list-alt nav-icon"></i>
                                    <p>Сите Купони</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div  class="container-fluid">

            @yield('admin_content')

        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>



<script src="{{asset('https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('//cdn.ckeditor.com/4.14.1/standard/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script>
<script>
    $(document).on("click", "#delete", function (e){
        e.preventDefault();
        var link = $(this).attr("route");
        bootbox.confirm("Дали сте сигурни дека сакате да ја избришите оваа содржина?",function (confirmed){
            if(confirmed){
                window.location.href = link;
            }
        });
    });
</script>

</body>
</html>
