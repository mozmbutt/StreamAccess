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
            <h3>{{ $userInfo->first_name }}</h3>
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
            @endif
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
