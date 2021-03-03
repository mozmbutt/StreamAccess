<div class="user-data full-width">
    <div class="user-profile">
        <div class="username-dt">
            <div class="usr-pic">
                <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/' . Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                    alt="">
            </div>
        </div>
        <!--username-dt end-->
        <div class="user-specs">
            <a href="/profile/{{ Auth::user()->id }}">
                <h3>{{ Auth::user()->userInfo->first_name }}</h3>

            </a>
            <span>{{ Auth::user()->userInfo->profession }}</span>
        </div>
    </div>
    <!--user-profile end-->
    <ul class="user-fw-status">
        <li>
            <h4><a href="/followings">Following</a></h4>
            <span>{{ $followingCount }}</span>
        </li>
        <li>
            <h4> <a href="/followers">Followers</a> </h4>
            <span>{{ $followerCount }}</span>
        </li>
        <li>
            <a href="http://www.gambolthemes.net/workwise-new/my-profile.html" title="">View Profile</a>
        </li>
    </ul>
</div>
<!--user-data end-->
