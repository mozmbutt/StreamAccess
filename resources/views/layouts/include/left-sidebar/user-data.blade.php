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
            <h3>{{ Auth::user()->userInfo->first_name }}</h3>
            <span>{{ Auth::user()->userInfo->profession }}</span>
        </div>
    </div>
    <!--user-profile end-->
    <ul class="user-fw-status">
        <li>
            <h4>Following</h4>
            <span>2</span>
        </li>
        <li>
            <h4>Followers</h4>
            <span>5M</span>
        </li>
        <li>
            <a href="http://www.gambolthemes.net/workwise-new/my-profile.html" title="">View Profile</a>
        </li>
    </ul>
</div>
<!--user-data end-->
