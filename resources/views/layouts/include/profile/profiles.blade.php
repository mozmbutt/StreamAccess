@extends('layouts.theme')
@section('main-content')
    <body oncontextmenu="return false;">
        <div class="wrapper">
            <section class="companies-info">
                <div class="container">
                    <div class="company-title">
                        <h3>All {{ $profession }}s</h3>
                    </div>
                    <!--company-title end-->
                    <div class="companies-list">
                        <div class="row">
                            @foreach ($professionals as $professional)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="company_profile_info">
                                        <div class="company-up-info">
                                            <img src="{{ asset('images/professional.png') }}" alt="">
                                            <h3>{{$professional->first_name}} {{$professional->last_name}}</h3>
                                            <h4>{{$professional->profession}}</h4>
                                            <ul>
                                                <li><a href="#" title="" class="follow">Follow</a></li>
                                            </ul>
                                        </div>
                                        <a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
                                    </div>
                                    <!--company_profile_info end-->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--companies-list end-->
                </div>
            </section>
            <!--companies-info end-->
            <footer>
                <div class="footy-sec mn no-margin">
                    <div class="container">
                        <ul>
                            <li><a href="help-center.html" title="">Help Center</a></li>
                            <li><a href="about.html" title="">About</a></li>
                            <li><a href="#" title="">Privacy Policy</a></li>
                            <li><a href="#" title="">Community Guidelines</a></li>
                            <li><a href="#" title="">Cookies Policy</a></li>
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="forum.html" title="">Forum</a></li>
                            <li><a href="#" title="">Language</a></li>
                            <li><a href="#" title="">Copyright Policy</a></li>
                        </ul>
                        <p><img src="images/copy-icon2.png" alt="">Copyright 2019</p>
                        <img class="fl-rgt" src="images/logo2.png" alt="">
                    </div>
                </div>
            </footer>

        </div>
        <!--theme-layout end-->





        <script type="text/javascript" src="js/jquery.min.js"></script>

        <script type="text/javascript" src="js/popper.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/flatpickr.min.js"></script>
        <script type="text/javascript" src="lib/slick/slick.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>

@endsection
