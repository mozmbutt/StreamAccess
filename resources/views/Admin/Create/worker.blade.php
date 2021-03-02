<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Workers | Stream Access</title>
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
                                    <h4 class="mb-0 font-size-18">Add New Worker</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Local Woker</a></li>
                                            <li class="breadcrumb-item active">Add New</li>
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
        
                                        <h4 class="card-title">Basic Information of Worker</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('worker.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name</label>
                                                        <input id="firstname" name="firstname" type="text" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="secondname">Second Name</label>
                                                        <input id="secondname" name="secondname" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone_no">Phone Number</label>
                                                        <input id="phone_no" required name="phone_no" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cnic_no">CNIC Number</label>
                                                        <input id="cnic_no" name="cnic_no" type="text" class="form-control">
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="skill">Skill</label>
                                                        <input required id="skill" name="skill" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Gender</label>
                                                        <select name="gender" class="form-control select2">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Address</label>
                                                        <textarea name="address" required class="form-control" id="address" rows="5" placeholder="location of worker you want to add..."></textarea>
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
