@extends('layouts.theme')
@section('main-content')
<section class="profile-account-setting">
    <div class="container">
        <div class="account-tabs-setting">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-user"></i>Personal Information</a>
                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Change Password</a>
                            <a class="nav-item nav-link" id="nav-privcy-tab" data-toggle="tab" href="#privcy" role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-group"></i>Requests</a>
                            <a class="nav-item nav-link" id="nav-blockking-tab" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fa fa-cc-diners-club"></i>Blocking</a>
                        </div>
                    </div>
                    <!--acc-leftbar end-->
                </div>

                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                            <div class="acc-setting">
                                <h3>Personal Information</h3>
                                <form action="{{ url('/saveAccountSetting') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                    
                                    <div class="username-dt">
                                        <div class="usr-pic pull-right mr-5">
                                            <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/'. Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="cp-field" style="margin-top: 55px;">
                                        <!-- <h5>First Name</h5> -->
                                        
                                        <div class="cpp-fiel" style="width : 80% ">
                                            <input class="pt-2 doc-input" id="dp" type="file" name="dp" >
                                            <i class="la la-file-photo-o">
                                                <span class="doc-icon-color ml-1">
                                                    Display Picture
                                                </span>
                                            </i>
                                        </div>
                                    </div>

                                    <div class="cp-field">
                                        <!-- <h5>First Name</h5> -->
                                        <div class="cpp-fiel">
                                            <input type="text" name="firstname" placeholder="First Name" value="{{Auth::user()->userInfo->first_name}}">
                                            <i class="fa fa-user-o"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <!-- <h5>Last Name</h5> -->
                                        <div class="cpp-fiel">
                                            <input type="text" name="lastname" placeholder="Last Name" value="{{Auth::user()->userInfo->last_name}}">
                                            <i class="fa fa-user-o"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <!-- <h5>Gender</h5> -->
                                        <div class="cpp-fiel">
                                            <select name="gender" class="form-control">
                                                <option value="Male" {{ Auth::user()->userInfo->gender == "Male"  ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{ Auth::user()->userInfo->gender == "Female"  ? 'selected' : ''}}>Female</option>
                                                <option value="Other" {{ Auth::user()->userInfo->gender == "Other"  ? 'selected' : ''}}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Date Of Birth</h5>
                                        <div class="cpp-fiel">
                                            <input type="date" class="date" id="datepickertest2" name="dob" placeholder="yyyy-mm-dd" value="{{Auth::user()->userInfo->date_of_birth}}">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <!-- <h5>Phone Number</h5> -->
                                        <div class="cpp-fiel">
                                            <input type="number" required placeholder="xxxx-xxx-xxxx" name="phone_no" value="{{Auth::user()->userInfo->phone_no}}">
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <!-- <h5>cnic Number</h5> -->
                                        <div class="cpp-fiel">
                                            <input type="number" required placeholder="xxxxx-xxxxxxx-x" name="cnic_no" value="{{Auth::user()->userInfo->cnic_no}}">
                                            <i class="fa fa-address-card"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <!-- <h5>Address</h5> -->
                                        <div class="cpp-fiel">
                                            <input type="text" placeholder="Enter Street Address" name="address" id="address" value="{{Auth::user()->userInfo->address}}">
                                            <i class="fa fa-map-marker"></i>
                                            <button class="cpp-fiel" id="prof-get-loc">GET MY CURRENT LOCATION</button>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Save Setting</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                                <div class="pro-work-status">
                                    <!-- <h4>Work Status  -  Last Months Working Status</h4> -->
                                </div>
                                <!--pro-work-status end-->
                            </div>
                            <!--acc-setting end-->
                        </div>

                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <div class="acc-setting">
                                <h3>Account Setting</h3>
                                <form action="{{url('changePassword')}}" method="post">
                                    @csrf
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    <div class="cp-field">
                                        <h5>Old Password</h5>
                                        <div class="cpp-fiel">
                                            <input type="password" required name="current_password" placeholder="Old Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>New Password</h5>
                                        <div class="cpp-fiel">
                                            <input type="password" required name="new_password" placeholder="New Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Repeat Password</h5>
                                        <div class="cpp-fiel">
                                            <input type="password" required name="new_confirm_password" placeholder="Repeat Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul>
                                            <li><button type="submit">Save Setting</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>

                        <div class="tab-pane fade" id="privcy" role="tabpanel" aria-labelledby="nav-privcy-tab">
                            <div class="acc-setting">
                                <h3>Requests</h3>
                                <div class="requests-list">
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img1.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Jessica William</h3>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img2.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>John Doe</h3>
                                            <span>PHP Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img3.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Poonam</h3>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img4.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Bill Gates</h3>
                                            <span>C & C++ Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img5.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>Jessica William</h3>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                    <div class="request-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/r-img6.png" alt="">
                                        </div>
                                        <div class="request-info">
                                            <h3>John Doe</h3>
                                            <span>PHP Developer</span>
                                        </div>
                                        <div class="accept-feat">
                                            <ul>
                                                <li><button type="submit" class="accept-req">Accept</button></li>
                                                <li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--accept-feat end-->
                                    </div>
                                    <!--request-detailse end-->
                                </div>
                                <!--requests-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div>

                        <div class="tab-pane fade" id="blockking" role="tabpanel" aria-labelledby="nav-blockking-tab">
                            <div class="helpforum">
                                <div class="row">
                                    <div class="col-12 security">
                                        <h3>Blocking</h3>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Blocking</h4>
                                            <p>See your list,and make changes if you'd like</p>
                                            <div class="bloktext">
                                                <p>You are not bloking anyone</p>
                                                <p>Need to blok or report someone? Go to the profile of the person you want to blok and select "Blok or Report" from the drowp-down menu at the top of the profile summery</p>
                                                <p>Note: After you have blocked the person, Any previous profile views of yours and of the other person will disappear from each of your "Who's viewed your profile" sections. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.doc-input').change(function() {
            $(this).siblings('i').addClass('text-success');
        });
        $("#prof-get-loc").on("click", e => {
            e.preventDefault();
            navigator.geolocation.getCurrentPosition(function(position) {
                $("#address").val(`${position.coords.latitude},${position.coords.longitude}`);
            });
        })
    })
</script>
@endsection