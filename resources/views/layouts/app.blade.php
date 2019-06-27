<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Base Css Files -->
    <link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('public/admin/css/animate.css')}}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{asset('public/admin/css/waves-effect.css')}}" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{asset('public/admin/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{asset('public/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('public/admin/js/modernizr.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    <!-- Authentication Links -->
@guest

@else
    <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>INVENTORY  </span></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        <form class="navbar-form pull-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification</li>
                                    <li class="list-group">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                        <small>There are
                                                            <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- last list item -->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <small>See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::to('public/admin/images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>

                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                        </li>
                        <li>
                            <a href="{{ route('pos') }}" class="waves-effect "><i class="md md-home"></i><span class="text-primary"><b> POS</b> </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="fas fa-users"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('employee.create')}}">Add Employee</a></li>
                                <li><a href="{{route('employee.index')}}">All Employee</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Customer </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('customer.create') }}">Add Customers</a></li>
                                <li><a href="{{ route('customer.index') }}">All Customer</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('supplier.create') }}">Add Supplier</a></li>
                                <li><a href="{{ route('supplier.index') }}">All Supplier</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Category </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('category.create')}}">Add Category</a></li>
                                <li><a href="{{route('category.index')}}">All Category</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Product </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('product.create')}}">Add Product</a></li>
                                <li><a href="{{route('product.index')}}">All Product</a></li>
                                <li><a href="{{ route('import.product') }}">Import Product</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Expense </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('add.expense') }}">Add New</a></li>
                                <li><a href="{{ route('today.expense') }}">Today Expense</a></li>
                                <li><a href="{{route('monthly.expense')}}">Monthly Expense</a></li>
                                <li><a href="{{route('yearly.expense')}}">Yearly Expense</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Attendence </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('take.attendence') }}">Take Attendence</a></li>
                                <li><a href="{{ route('all.attendence') }}">All Attendences</a></li>
                                <li><a href="#">Monthly Attendence</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Setting </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('settings') }}">Setting</a></li>

                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Orders </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('pending.orders') }}">Pending Orders</a></li>
                                <li><a href="{{ route('success.orders') }}">Success Orders</a></li>
                            </ul>
                        </li>


                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
    @endguest
</div>
<main class="py-4">
    @yield('content')
</main>


</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/js/waves.js')}}"></script>
<script src="{{asset('public/admin/js/wow.min.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('public/admin/assets/chat/moment-2.2.1.js')}}"></script>
<script src="{{asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('public/admin/assets/jquery-detectmobile/detect.js')}}"></script>
<script src="{{asset('public/admin/assets/fastclick/fastclick.js')}}"></script>
<script src="{{asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

<!-- sweet alerts -->
<script src="{{asset('public/admin/assets/sweet-alert/sweet-alert.min.js')}}"></script>
<script src="{{asset('public/admin/assets/sweet-alert/sweet-alert.init.js')}}"></script>

<!-- flot Chart -->
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.time.j')}}s"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.tooltip.min.j')}}s"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/admin/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

<!-- Counter-up -->
<script src="{{asset('public/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('public/admin/js/jquery.app.js')}}"></script>

<!-- Dashboard -->
<script src="{{asset('public/admin/js/jquery.dashboard.js')}}"></script>

<!-- Chat -->
<script src="{{asset('public/admin/js/jquery.chat.js')}}"></script>
<script src="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>
<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<!-- Todo -->
<script src="{{asset('public/admin/js/jquery.todo.js')}}"></script>

<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>

<!-- Demo Js -->
<script src="{{ asset('assets/backend/js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>

@stack('js')
</body>
</html>
