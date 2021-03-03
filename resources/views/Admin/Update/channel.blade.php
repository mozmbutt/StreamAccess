<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Channel Update | Stream Access</title>
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
                                    <h4 class="mb-0 font-size-18">Update Channel</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Channel</a></li>
                                            <li class="breadcrumb-item active">Update</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start page Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Update Information of Channel</h4>
                                        <p class="card-title-desc">Fill required information below</p>
        
                                        <form action="{{ route('channel.update', ['channel'=>$channel->id]) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" value="{{$channel->id}}">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Title</label>
                                                        <input id="name" name="name" type="text" required class="form-control" value="{{$channel->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <select required name="slug" class="form-control">
                                                            <option value="">Select Slug</option>
                                                            <option value="Geek" {{$channel->slug == 'Geek' ? 'selected' : ''}}>Geek</option>
                                                            <option value="Doctor" {{$channel->slug == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                                                            <option value="Laywer" {{$channel->slug == 'Laywer' ? 'selected' : ''}}>Laywer</option>
                                                            <option value="Islamic Scholor" {{$channel->slug == 'Islamic Scholor' ? 'selected' : ''}}>Islamic Scholor</option>
                                                            <option value="Engineer" {{$channel->slug == 'Engineer' ? 'selected' : ''}}>Engineer</option>
                                                            <option value="Business" {{$channel->slug == 'Business' ? 'selected' : ''}}>Business</option>
                                                            <option value="Architect" {{$channel->slug == 'Architect' ? 'selected' : ''}}>Architect</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
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
