<div class="user-data full-width">
    <div class="user-profile">
        <div class="username-dt">
            <div class="usr-pic">
                <img src="{{ asset($userInfo->display_picture ? 'storage/' . $userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                    alt="">
            </div>
        </div>
        <!--username-dt end-->
        <div class="user-specs">
            <a href="">
                <h3>{{ $userInfo->first_name }}</h3>
            </a>

            <span>{{ $userInfo->profession }}</span>
            @if ($user->id != Auth::user()->id)
                <div class="button">
                    <ul>
                        <li><a id="follow"
                                class="{{ $text == 'Follow' ? 'mt-2 btn btn-success' : 'mt-2 btn btn-primary' }}"
                                href="javascript:void(0);" data-item="{{ $user->id }}">{{ $text }}</a>
                        </li>
                    </ul>
                </div>
            @else
                @if (Auth::user()->role == 'customer')
                    <div class="button">
                        <ul>
                            <li><a id="gopro"
                                    class="mt-2 btn btn-primary"
                                    href="/gopro" data-item="{{ $user->id }}">Go Pro</a>
                            </li>
                        </ul>
                    </div>
                @endif
            @endif
        </div>
    </div>
    <!--user-profile end-->
    <ul class="user-fw-status">
        <li>
            <h4><a href="">Following</a></h4>
            <span>{{ $followingCount }}</span>
        </li>
        <li>
            <h4> <a href="">Followers</a> </h4>
            <span>{{ $followerCount }}</span>
        </li>
        <li>
            <a href="http://www.gambolthemes.net/workwise-new/my-profile.html" title="">View Profile</a>
        </li>
    </ul>
</div>
<!--user-data end-->
@section('follow')
    <script>
        $(document).ready(function() {
            $("#follow").on("click", function() {
                $("#follow").toggleClass('btn-success btn-primary');
                //$(this).text($(this).text() == 'Follow' ? 'Following' : 'Follow');
                var following_id = $(this).data('item');
                axios.get(`/follow/${following_id}`)
                    .then(response => {
                        $('#follow').text(response.data.msg);
                    })
                    .catch(error => {
                        console.log(error)
                    });
            });
        });

    </script>
@endsection
