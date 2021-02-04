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
                                <h4 class="mb-0 font-size-18">Pending Users List</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                        <li class="breadcrumb-item active">Pending Users</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" style="width: 70px;">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($infos as $info)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                P
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{$info->first_name}}</a></h5>
                                                        <p class="text-muted mb-0">{{$info->last_name}}</p>
                                                    </td>
                                                    <td>{{$info->user->email}}</td>
                                                    <td>
                                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                                            <li class="list-inline-item px-2">
                                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Approve"><i class="bx bx-check-double"></i></a>
                                                            </li>
                                                            <li class="list-inline-item px-2">
                                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Dicline"><i class="bx bx-trash-alt"></i></a>
                                                            </li>
                                                            <li class="list-inline-item px-2">
                                                                <a href="#" data-id="{{ $info->user_id ? $info->user_id : '' }}" data-name="{{ $info->first_name ? $info->first_name : '' }}" data-matric="{{$info->education->metric}}" data-inter="{{$info->education->intermediate}}" data-bacholors="{{$info->education->bachelors}}" data-masters="{{$info->education->masters ? $info->education->masters : ''}}" data-phd="{{$info->education->phd}}" data-toggle="modal" data-target="#requestModal" data-placement="top" title="View Details">
                                                                    <i class="bx bx-show"></i>
                                                                </a>

                                                            </li>

                                                        </ul>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalLabel">Pending Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">User id: <span id="user_id" class="text-primary"></span></p>
                    <p class="mb-4">User Name: <span id="name" class="text-primary"></span></p>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Education</th>
                                    <th scope="col">Picture</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Matric
                                            </h5>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div>
                                            <a id="documentMatric" data-toggle="modal" data-document="{{ asset('images/logo-light-removebg-preview.png') }}" data-target="#documentModal" data-placement="top">
                                                <img id="matric" src="{{ asset('images/logo-light-removebg-preview.png') }}" class="avatar-sm">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Intermadiate
                                            </h5>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div>
                                            <a id="documentIntermediate" data-toggle="modal" data-document="{{ asset('images/logo-light-removebg-preview.png') }}" data-target="#documentModal" data-placement="top">
                                                <img id="inter" src="{{ asset('images/logo-light-removebg-preview.png') }}" class="avatar-sm">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Bacholors
                                            </h5>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div>
                                            <a id="documentBacholors" data-toggle="modal" data-document="{{ asset('images/logo-light-removebg-preview.png') }}" data-target="#documentModal" data-placement="top">
                                                <img id="bacholors" src="{{ asset('images/logo-light-removebg-preview.png') }}" alt="" class="avatar-sm">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Masters
                                            </h5>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div>
                                            <a id="documentMasters" data-toggle="modal" data-document="{{ asset('images/logo-light-removebg-preview.png') }}" data-target="#documentModal" data-placement="top">
                                                <img id="masters" src="{{ asset('images/logo-light-removebg-preview.png') }}" alt="" class="avatar-sm">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">PHD
                                            </h5>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <div>
                                            <a id="documentPhd" data-toggle="modal" data-document="{{ asset('images/logo-light-removebg-preview.png') }}" data-target="#documentModal" data-placement="top">
                                                <img id="phd" src="{{ asset('images/logo-light-removebg-preview.png') }}" alt="" class="avatar-sm">
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Approve</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox -->
    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentLabel">Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="documentZoom" src="{{ asset('images/logo-light-removebg-preview.png') }}" style="width: 100%;">
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
            $('#requestModal').on('show.bs.modal', function(e) {
                var link = $(e.relatedTarget);
                let modal = $(this);
                let id = link.data("id");
                let name = link.data("name");
                console.log(link.data("masters"));
                let matric = 'storage/' + link.data("matric");
                let intermediate = 'storage/' + link.data("inter");
                let bacholors = 'storage/' + link.data("bacholors");
                let masters = 'storage/' + link.data("masters");
                let phd = 'storage/' + link.data("phd");
                modal.find("#user_id").html(id);
                modal.find("#name").html(name);
                if (matric != "storage/") {
                    modal.find("#matric").attr('src', matric);
                    modal.find("#documentMatric").data('document', matric);
                }
                if (intermediate != "storage/") {
                    modal.find("#inter").attr('src', intermediate);
                    modal.find("#documentIntermediate").data('document', intermediate);
                }
                if (bacholors != "storage/") {
                    modal.find("#bacholors").attr('src', bacholors);
                    modal.find("#documentBacholors").data('document', bacholors);
                }
                if (masters != "storage/") {
                    
                    modal.find("#masters").attr('src', masters);
                    modal.find("#documentMasters").data('document', masters);
                }
                if (phd != "storage/") {
                    modal.find("#phd").attr('src', phd);
                    modal.find("#documentPhd").data('document', phd);
                }
                masters = null;
            });
            $('#documentModal').on('show.bs.modal', function(e) {
                var link = $(e.relatedTarget);
                let modal = $(this);
                let document = link.data("document");
                if (document != "") {
                    modal.find("#documentZoom").attr('src', document);
                }
            });

        });
    </script>
</body>


</html>