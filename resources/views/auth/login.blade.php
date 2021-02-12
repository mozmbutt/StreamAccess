<!DOCTYPE html>
<html>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Oct 2020 21:30:33 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Stream Access</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
</head>


<body class="sign-in" oncontextmenu="return false;">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="images/test-logo.png" alt="">
                                    <p>Stream Access, is a global platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                </div>
                                <!--cm-logo end-->
                                <img src="images/cm-main-img.png" alt="">
                            </div>
                            <!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="{{!isset($activeTab) ? 'current' : ''}}"><a href="#" title="">Sign in</a></li>
                                    <li data-tab="tab-2" class="{{isset($activeTab) && $activeTab == 'signup' ? 'current' : ''}}"><a href="#" title="">Sign up</a></li>
                                </ul>
                                <div class="sign_in_sec {{!isset($activeTab) ? 'current' : ''}}" id="tab-1">

                                    <h3>Sign in</h3>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input id="email" type="email" name="email" required autofocus>
                                                    <i class="la la-user"></i>
                                                </div>
                                                <!--sn-field end-->
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input id="password" type="password" name="password" required autocomplete="current-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="cc" id="c1">
                                                        <label for="c1">
                                                            <span></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div>
                                                    <!--fgt-sec end-->
                                                    <a href="#" title="">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--sign_in_sec end-->
                                <div class="sign_in_sec {{isset($activeTab) && $activeTab == 'signup' ? 'current' : ''}}" id="tab-2">
                                    <div class="signup-tab">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <h2>johndoe@example.com</h2>
                                        <ul>
                                            <li data-tab="tab-3" class="current"><a href="#" title="">Customer</a></li>
                                            <li data-tab="tab-4"><a href="#" title="">Professional </a></li>
                                        </ul>
                                    </div>
                                    <!--signup-tab end-->
                                    <div class="dff-tab current" id="tab-3">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="role" type="text" name="role" hidden value="customer">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="firstname" type="text" name="firstname" required autofocus placeholder="First Name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="lastname" type="text" name="lastname" required autofocus placeholder="Last Name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="username" type="text" name="username" required autofocus placeholder="username">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="email" type="email" name="email" required placeholder="email">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="confirm password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>

                                                <div class="flex items-center justify-end mt-4">
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                        {{ __('Already registered?') }}
                                                    </a>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit">{{ __('Register') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                    <div class="dff-tab" id="tab-4">
                                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="role" type="text" name="role" hidden value="professional">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="firstname" type="text" name="firstname" required autofocus placeholder="First Name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="lastname" type="text" name="lastname" required autofocus placeholder="Last Name">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <select required name="profession" class="form-control">
                                                            <option>Select Profession</option>
                                                            <option value="Geek">Geek</option>
                                                            <option value="Doctor">Doctor</option>
                                                            <option value="Laywer">Laywer</option>
                                                            <option value="Islamic Scholor">Islamic Scholor</option>
                                                            <option value="Engineer">Engineer</option>
                                                            <option value="Business">Business</option>
                                                            <option value="Architect">Architect</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="username" type="text" name="username" required autofocus placeholder="username">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="email" type="email" name="email" required placeholder="email">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="confirm password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input class="pt-2 doc-input" id="metric" type="file" required name="metric">
                                                        <i class="la la-file-photo-o">
                                                            <span class="doc-icon-color ml-1">
                                                                metric
                                                            </span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input class="pt-2 doc-input" id="intermediate" type="file" required name="intermediate">
                                                        <i class="la la-file-photo-o">
                                                            <span class="doc-icon-color ml-1">
                                                                intermediate
                                                            </span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input class="pt-2 doc-input" id="bachelors" type="file" required name="bachelors">
                                                        <i class="la la-file-photo-o">
                                                            <span class="doc-icon-color ml-1">
                                                                bachelors
                                                            </span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input class="pt-2 doc-input" id="masters" type="file" name="masters">
                                                        <i class="la la-file-photo-o">
                                                            <span class="doc-icon-color ml-1">
                                                                masters
                                                            </span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input class="pt-2 doc-input" id="phd" type="file" name="phd">
                                                        <i class="la la-file-photo-o">
                                                            <span class="doc-icon-color ml-1">
                                                                phd
                                                            </span>
                                                        </i>
                                                    </div>
                                                </div>

                                                <div class="flex items-center justify-end mt-4">
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                        {{ __('Already registered?') }}
                                                    </a>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit">{{ __('Register') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                </div>
                            </div>
                            <!--login-sec end-->
                        </div>
                    </div>
                </div>
                <!--signin-pop end-->
            </div>
            <!--signin-popup end-->

        </div>
        <!--sign-in-page end-->


    </div>
    <!--theme-layout end-->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.doc-input').change(function() {
                $(this).siblings('i').addClass('text-success');
            });
        })
    </script>
</body>

</html>