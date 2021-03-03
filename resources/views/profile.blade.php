@extends('layouts.theme')
@section('main-content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    @include('layouts.include.profile.left-sidebar')
                    @include('layouts.include.profile.main-content')
                    @include('layouts.include.profile.right-sidebar')
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
@endsection