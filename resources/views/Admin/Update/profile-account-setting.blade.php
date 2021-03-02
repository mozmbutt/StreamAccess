<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Profile | Stream Access</title>
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
                                    <h4 class="mb-0 font-size-18">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                            <li class="breadcrumb-item active">Setting</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start page Body -->

                        <!-- persnol information -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Admin Persnol Information</h4>
                                        <p class="card-title-desc">Fill required information below</p>
        
                                        <form action="{{ url('/saveAccountSetting') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group d-flex">
                                                        <div class="usr-pic rounded mr-5">
                                                            <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/'. Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}" alt="" class="form-control" width="30%">
                                                        </div>
                                                        <div class="cpp-fiel" >
                                                                <div class="form-group">
                                                                    <label for="firstname">First Name</label>
                                                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{Auth::user()->userInfo->first_name}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="secondname">Second Name</label>
                                                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{Auth::user()->userInfo->last_name}}">
                                                                </div> 
                                                            <input class="pt-4 doc-input" id="dp" type="file" name="dp" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone_no">Phone Number</label>
                                                        <input id="phone_no" required name="phone_no" type="text" class="form-control" value="{{Auth::user()->userInfo->phone_no}}">
                                                    </div>
                                                    
                                                </div>
        
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                        <label for="D.O.B">D.O.B</label>
                                                        <input type="date" class="date form-control" id="datepickertest2" name="dob" placeholder="yyyy-mm-dd" value="{{Auth::user()->userInfo->date_of_birth}}">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="Male" {{ Auth::user()->userInfo->gender == "Male"  ? 'selected' : ''}}>Male</option>
                                                            <option value="Female" {{ Auth::user()->userInfo->gender == "Female"  ? 'selected' : ''}}>Female</option>
                                                            <option value="Other" {{ Auth::user()->userInfo->gender == "Other"  ? 'selected' : ''}}>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control"  required placeholder="location..." name="address" value="{{Auth::user()->userInfo->address}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cnic_no">CNIC Number</label>
                                                        <input type="number" class="form-control"  required placeholder="xxxxx-xxxxxxx-x" name="cnic_no" value="{{Auth::user()->userInfo->cnic_no}}">
                                                    </div>
                                                </div>
                                            </div>
        
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- change password -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Change your password</h4>
                                        <p class="card-title-desc">Keep it safe and persnol.</p>
        
                                        <form action="{{url('changePassword')}}" method="POST">
                                            @csrf
                                            @foreach ($errors->all() as $error)
                                                <p class="text-danger">{{ $error }}</p>
                                            @endforeach
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="old password">Old Password</label>
                                                        <input type="password" class="form-control" required name="current_password" placeholder="Old Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new password">New Password</label>
                                                        <input type="password" class="form-control" required name="new_password" placeholder="New Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm password">Confirm New Password</label>
                                                        <input type="password" class="form-control" required name="new_confirm_password" placeholder="Confirm New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Change Password</button>
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End page Body -->
                    </div> 
                    <!-- container-fluid -->
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
@section('script')
<script>
    $(document).ready(function() {
        $('.doc-input').change(function() {
            $(this).siblings('i').addClass('text-success');
        });
    })
</script>
@endsection