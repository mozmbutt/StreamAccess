<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admins | Stream Access</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Stream Access - A Click Away" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    
        <!-- Bootstrap Css -->
        <link href="{{ asset('css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />
    
    </head>

    
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                @include('Admin.include.top-navbar')
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            @include('Admin.include.left-navbar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">All Admins</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                            <li class="breadcrumb-item active">Admins</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                D
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">David McHenry</a></h5>
                                        <p class="text-muted">UI/UX Designer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Photoshop</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">illustrator</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="{{ asset('images/dp.png') }}" alt="">
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Frank Kirk</a></h5>
                                        <p class="text-muted">Frontend Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Html</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Css</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="{{ asset('images/dp.png') }}" alt="">
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Rafael Morales</a></h5>
                                        <p class="text-muted">Backend Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Php</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Java</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Python</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-success text-success font-size-16">
                                                M
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Mark Ellison</a></h5>
                                        <p class="text-muted">Full Stack Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Ruby</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Php</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                D
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">David McHenry</a></h5>
                                        <p class="text-muted">UI/UX Designer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Photoshop</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">illustrator</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="{{ asset('images/dp.png') }}" alt="">
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Frank Kirk</a></h5>
                                        <p class="text-muted">Frontend Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Html</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Css</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <img class="rounded-circle avatar-sm" src="{{ asset('images/dp.png') }}" alt="">
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Rafael Morales</a></h5>
                                        <p class="text-muted">Backend Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Php</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Java</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Python</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-success text-success font-size-16">
                                                M
                                            </span>
                                        </div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">Mark Ellison</a></h5>
                                        <p class="text-muted">Full Stack Developer</p>

                                        <div>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Ruby</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">Php</a>
                                            <a href="#" class="badge badge-primary font-size-11 m-1">2 + more</a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex font-size-20 contact-links">
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Projects"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin mr-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    @include('Admin.include.footer')
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/simplebar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
        
        <!-- apexcharts -->
        <script src="{{ asset('js/app.theme.js') }}"></script>
        <script src="{{ asset('js/dashboard.init.js') }}"></script>
        <script src="{{ asset('js/apexcharts.min.js') }}"></script>

    </body>
</html>
