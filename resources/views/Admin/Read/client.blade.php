<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Clients | Stream Access</title>
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
                                    <h4 class="mb-0 font-size-18">All Clients</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">View Users</a></li>
                                            <li class="breadcrumb-item active">Clients</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            @foreach ($clients as $client)
                            <div class="col-xl-3 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                C
                                            </span>
                                        </div>
                                        <h5 class="font-size-15">{{$client->userInfo->first_name}}</h5>
                                        <p class="text-muted">{{$client->userInfo->second_name}}</p>
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            <p class="font-size-15">Asked Questions</p>
                                        </a>
                                    </div>  
                                    
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="#" 
                                                    data-id="{{ $client->userInfo->user_id ? $client->userInfo->user_id : '' }}" 
                                                    data-firstname="{{ $client->userInfo->first_name ? $client->userInfo->first_name : '' }}" 
                                                    data-secondname="{{ $client->userInfo->last_name ? $client->userInfo->last_name : '' }}" 
                                                    data-email="{{ $client->email ? $client->email : '' }}" 
                                                    data-gender="{{ $client->userInfo->gender ? $client->userInfo->gender : '' }}"
                                                    data-dob="{{ $client->userInfo->date_of_birth ? $client->userInfo->date_of_birth : '' }}" 
                                                    data-phone="{{ $client->userInfo->phone_no ? $client->userInfo->phone_no : '' }}" 
                                                    data-cnic="{{ $client->userInfo->cnic_no ? $client->userInfo->cnic_no : '' }}" 
                                                    data-address="{{ $client->userInfo->address ? $client->userInfo->address : '' }}" 
                                                    data-toggle="modal" data-target="#infoModal" data-placement="top" title="View Documents">
                                                    <i class="bx bx-show"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="professional-profile-setting/{{ $client->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-user-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Client Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">User id: <span id="id" class="text-primary"></span></p>
                        <p class="mb-2">First Name: <span id="firstname" class="text-primary"></span></p>
                        <p class="mb-4">Second Name: <span id="secondname" class="text-primary"></span></p>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">More Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">E-mail</h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="email"></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Phone Number</h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="phone"></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">CNIC Number
                                                </h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="cnic"></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Address
                                                </h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="address"></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Date of Birth
                                                </h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="dob"></p>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Gender
                                                </h5>
                                            </div>
                                        </td>
                                        <th scope="row">
                                            <div>
                                                <p class="mb-2" id="gender"></p>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/simplebar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
        <!-- apexcharts -->
        <script src="{{ asset('js/app.theme.js') }}"></script>
        <script src="{{ asset('js/dashboard.init.js') }}"></script>
        <script src="{{ asset('js/apexcharts.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#infoModal').on('show.bs.modal', function(e) {
                    var link = $(e.relatedTarget);
                    let modal = $(this);
                    let id = link.data("id");
                    let firstname = link.data("firstname");
                    let secondname = link.data("secondname");
                    let email = link.data("email");
                    let phone = link.data("phone");
                    let cnic = link.data("cnic");
                    let address = link.data("address");
                    let dob = link.data("dob");
                    let gender = link.data("gender");
                    
                    modal.find("#id").html(id);
                    modal.find("#firstname").html(firstname);
                    modal.find("#secondname").html(secondname);
                    modal.find("#email").html(email);
                    modal.find("#gender").html(gender);
                    modal.find("#dob").html(dob);
                    modal.find("#phone").html(phone);
                    modal.find("#cnic").html(cnic);
                    modal.find("#address").html(address);
                    
                });
            });
        </script>
</body>
</html>
