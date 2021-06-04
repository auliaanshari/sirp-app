<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="assets/image/logo-t.png">
    <title>Sistem Informasi Rekapitulasi Perkuliahan</title>

    <link href={{asset("vendors/datatables/dataTables.bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("vendors/select2/select2.css")}} rel="stylesheet">
    <!-- Core css -->
    <link href={{asset("css/app.min.css")}} rel="stylesheet">
    <!-- page css -->
    <link href={{asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.css")}} rel="stylesheet">
    <link href={{asset("vendors/datatables/buttons.dataTables.min.css")}} rel="stylesheet">

</head>
<body>
<div class="app">
    <div class="layout">

            <div class="header">
                <div class="logo logo-dark mt-2">
                    <a href="{{ url('/') }}">
                        <img src={{asset("image/download.png")}} alt="Logo">
                        <img class="avatar avatar-image logo-fold ml-3 m-h-10 m-r-15 center" src={{asset("image/download.png")}} alt="Logo" style="width:70%">
                    </a>
                </div>
                
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="nav-left">
                    <!-- <h1>Sistem Informasi Rekapitulasi Perkuliahan</h1> -->
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">AA
                                </div>
                                <span class="mr-4"> Admin <i class="anticon font-size-10 anticon-down"></i> </span>
                            </div>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropdown">
                                    <a href="{{ url('logout') }}">
                                    <i class="anticon anticon-gold"></i>
                                    <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>

            <div class="side-nav">
                @yield('side-bar')
            </div>

            <div class="page-container">
                <div class="main-content">
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="footer-content">
                        <p ></p>.</p>
                        <span>
                            <p class="m-b-0">Copyright © 2021 SIRP.</p>
                        </span>
                    </div>
                </footer>
            </div>
    </div>
</div>

    <script src={{asset("js/vendors.min.js")}}></script>

    <script src={{asset("js/app.min.js")}}></script>

    <script src={{asset("vendors/datatables/jquery.dataTables.min.js")}} type="text/javascript"></script>
    <script src={{asset("vendors/datatables/dataTables.bootstrap.min.js")}} type="text/javascript"></script>

    <script src={{asset("vendors/select2/select2.min.js")}}></script>
    <script src={{asset("vendors/jquery-validation/jquery.validate.min.js")}}></script>
    <script src={{asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")}}></script>
    <script type="text/javascript">
        $('.datepicker-input').datepicker({
            format: '{{ config('app.date_format_js') }}',
            timeFormat: 'hh:mm:ss',
            autoclose:true
        });
    </script>

    @yield('js')

</body>
</html>
