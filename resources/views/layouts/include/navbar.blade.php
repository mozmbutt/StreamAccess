<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="/" title=""><img src="/images/test-logo.png" alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <form
                    action="{{ Request::path() != '/' ? url('/search', ['url' => Request::path()]) : url('/search', ['url' => 'profile']) }}"
                    method="post">
                    @csrf
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            @if (role('professional') || role('customer') || role('admin'))
                <nav>
                    <ul>
                        <li>
                            <a href="/" title="">
                                <span><img src="/images/icon1.png" alt=""></span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('forum') }}" title="">
                                <span><img src="/images/icon2.png" alt=""></span>
                                Forum
                            </a>

                        </li>
                        <li>
                            <a href="/profile/{{ Auth::user()->id }}" title="">
                                <span><img src="/images/icon4.png" alt=""></span>
                                Profiles
                            </a>
                            <ul>
                                <li><a href="/profile/{{ Auth::user()->id }}" title="">My Profile</a></li>
                                <li>
                                    <a href="{{ url('/professionls', ['profession' => Auth::user()->userInfo->profession]) }}"
                                        title="">
                                        All {{ Auth::user()->userInfo->profession }}s
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/all-professionls') }}" title="">
                                        All Professionals
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/all-workers" title="">
                                <span><img src="/images/icon3.png" alt=""></span>
                                Workers
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('job.index') }}" title="">
                                <span><img src="/images/icon5.png" alt=""></span>
                                Jobs
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--nav end-->
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div>
                <!--menu-btn end-->
                <div class="user-account">
                    <div class="user-info d-flex">
                        <img width="30" height="30"
                            src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/' . Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                            alt="">

                        <a href="#" class="text-truncate" title="">{{ Auth::user()->userInfo->first_name }}</a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss" id="users">
                        <h3>{{ Auth::user()->userInfo->first_name . ' ' . Auth::user()->userInfo->last_name }}</h3>
                        <ul class="on-off-status">
                            <li>
                                <div class="fgt-sec">
                                    <input type="radio" name="cc" id="c5" checked>
                                    <label for="c5">
                                        <span></span>
                                    </label>
                                    @if (Cache::has('user-is-online-' . Auth::user()->id))
                                        <small>Online</small>
                                    @else
                                        <small>Offline</small>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <h3>Setting</h3>
                        <ul class="us-links">
                            <li><a href="{{ url('profile-account-setting') }}" title="">Account Setting</a></li>
                            <li><a href="#" title="">Privacy</a></li>
                            <li><a href="#" title="">Faqs</a></li>
                            <li><a href="#" title="">Terms & Conditions</a></li>
                            <!-- <li><a href="{{ url('admin') }}" title="">Admin</a></li> -->
                        </ul>
                        <h3 class="tc">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault();
        this.closest('form').submit();">{{ __('Logout') }}</a>
                            </form>
                        </h3>
                    </div>
                    <!--user-account-settingss end-->
                </div>
            @else
                <nav>
                    <div class="row float-right mt-2">
                        <div class="col-lg-5 mx-auto">
                            <a class="btn btn-outline-danger text-white" href="{{ url('login') }}" title="">Login</a>
                        </div>
                        <div class="col-lg-7 mx-auto">
                            <a class="btn btn-outline-danger text-white" href="{{ url('register') }}" title="">Sign
                                Up</a>
                        </div>
                    </div>
                </nav>
            @endif
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->
