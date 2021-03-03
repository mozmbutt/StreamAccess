@extends('layouts.theme')
@section('main-content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        @include('layouts.include.left-sidebar')
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="posts-section">
                                    @include('layouts.include.main-content.top-profiles')
                                    @foreach ($userInfos as $userInfo)
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img width="50" height="50"
                                                        src="{{ asset($userInfo->display_picture ? 'storage/' . $userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                                                        alt="">
                                                    <div class="usy-name">
                                                        <a href="/profile/{{ $userInfo->user->id }}" title="">
                                                            <h3>{{ $userInfo->first_name . ' ' . $userInfo->last_name }}
                                                            </h3>
                                                        </a>
                                                        <img src="/images/icon8.png"
                                                            alt=""><span>{{ $userInfo->profession }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--post-bar end-->
                                    @endforeach
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        @include('layouts.include.profile.right-sidebar')
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>
@endsection
