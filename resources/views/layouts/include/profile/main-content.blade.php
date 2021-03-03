<div class="col-lg-6 col-md-8 no-pd">
    <div class="main-ws-sec">
        @if ($user->id == Auth::user()->id)
        @include('layouts.include.profile.main-content.post-topbar')
            
        @endif
        @include('layouts.include.profile.main-content.posts')
       
    </div>
    <!--main-ws-sec end-->
</div>