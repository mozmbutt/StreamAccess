<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Channels | Stream Access</title>
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
                                    <h4 class="mb-0 font-size-18">Add New Channel</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Channel</a></li>
                                            <li class="breadcrumb-item active">Add New</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start page Body -->
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Basic Information of Channel</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('channel.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="channelTitle">Channel Title</label>
                                                        <input id="name" name="name" type="text" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <select required name="slug" class="form-control">
                                                            <option value="">Select Slug</option>
                                                            <option value="Geek">Geek</option>
                                                            <option value="Doctor">Doctor</option>
                                                            <option value="Lawyer">Lawyer</option>
                                                            <option value="Islamic Scholor">Islamic Scholor</option>
                                                            <option value="Engineer">Engineer</option>
                                                            <option value="Business">Business</option>
                                                            <option value="Architect">Architect</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save</button>
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
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





{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Stream Access - A Click Away</title>
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

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('Admin.include.top-navbar')
        </header>

        @include('Admin.include.left-navbar')
        <div class="main-content">

            <div class="container" style="margin-top: 100px">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create a New Channel</div>

                            <div class="panel-body">
                                <form method="POST" action="{{ route('channel.store') }}">
                                    {{ csrf_field() }}

                                    <div class='form-group'>
                                        <label for='title'>Title:</label>
                                        <input type='text' class='form-control' name='title'
                                            value="{{ old('title') }}" required>
                                    </div>

                                    <div class='form-group'>
                                        <label for='slug'>Slug:</label>
                                        <input type='text' class='form-control' name='slug' value="{{ old('slug') }}"
                                            required>
                                    </div>

                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-primary'>Publish</button>
                                    </div>

                                    @if (count($errors))
                                        <ul class='alert alert-danger'>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                @include('Admin.include.footer')
            </footer>
        </div>
    </div>
    <!-- End Page -->

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

</html> --}}
