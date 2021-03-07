<div class="top-profiles">
    <div class="pf-hd">
        <h3>Top Profiles</h3>
        <i class="la la-ellipsis-v"></i>
    </div>
    <div class="profiles-slider">
        @foreach ($users as $user)
            <div class="user-profy">
                <img src="{{ asset($user->display_picture ? 'storage/' . $user->display_picture : 'images/logo-light-removebg-preview.png') }}">
                <h3>{{ $user->first_name . ' ' . $user->last_name }}</h3>
                <span>{{ $user->profession }}</span>
                <ul>
                    <li><a id="follow"
                            class="mt-2 btn btn-success"
                            href="javascript:void(0);" data-item="{{ $user->id }}">Follow</a></li>
                </ul>
                <a href="/profile/{{ $user->user_id }}" title="">View Profile</a>
            </div>
            <!--user-profy end-->
        @endforeach

    </div>
    <!--profiles-slider end-->
</div>
<!--top-profiles end-->
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