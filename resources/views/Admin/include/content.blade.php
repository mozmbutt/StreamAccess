<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Stream Acess</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="{{ asset('images/dp.png') }}" alt=""
                                        class="img-thumbnail rounded-circle mt-4">
                                </div>
                                <h5 class="font-size-15 text-truncate">{{Auth::user()->name}}</h5>
                                <p class="text-muted mb-0 text-truncate">{{Auth::user()->role}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Professionals</p>
                                        <h4 class="mb-0">1,235</h4>
                                    </div>

                                    <div
                                        class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">New Requests</p>
                                        <h4 class="mb-0">569</h4>
                                    </div>

                                    <div
                                        class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Clients</p>
                                        <h4 class="mb-0">456</h4>
                                    </div>

                                    <div
                                        class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 float-sm-left">Add New</h4>
                        <div class="float-sm-right">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Professional</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Worker</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>

                        <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Requests</h4>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="custom-control-label"
                                                    for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Date of Apply</th>
                                        <th>Type</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label"
                                                    for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);"
                                                class="text-body font-weight-bold">4523</a>
                                        </td>
                                        <td>
                                            Neal Matthews
                                        </td>
                                        <td>
                                            07 Oct, 2020
                                        </td>
                                        <td>
                                            Professional
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label"
                                                    for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);"
                                                class="text-body font-weight-bold">4523</a>
                                        </td>
                                        <td>
                                            Neal Matthews
                                        </td>
                                        <td>
                                            07 Oct, 2020
                                        </td>
                                        <td>
                                            Professional
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label"
                                                    for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);"
                                                class="text-body font-weight-bold">4523</a>
                                        </td>
                                        <td>
                                            Neal Matthews
                                        </td>
                                        <td>
                                            07 Oct, 2020
                                        </td>
                                        <td>
                                            Professional
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label"
                                                    for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);"
                                                class="text-body font-weight-bold">4523</a>
                                        </td>
                                        <td>
                                            Neal Matthews
                                        </td>
                                        <td>
                                            07 Oct, 2020
                                        </td>
                                        <td>
                                            Professional
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label"
                                                    for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);"
                                                class="text-body font-weight-bold">4523</a>
                                        </td>
                                        <td>
                                            Neal Matthews
                                        </td>
                                        <td>
                                            07 Oct, 2020
                                        </td>
                                        <td>
                                            Professional
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Modal -->
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-2">User id: <span class="text-primary">4520</span></p>
                <p class="mb-4">User Name: <span class="text-primary">Neal Matthews</span></p>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Picture</th>
                                <th scope="col">Education</th>
                                <th scope="col">Experience</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="{{ asset('images/dp.png') }}" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">MS Computer Sciences
                                        </h5>
                                    </div>
                                </td>
                                <td>2 Years</td>
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
<!-- end modal -->