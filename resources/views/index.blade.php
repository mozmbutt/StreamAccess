@extends('layouts.theme')
@section('main-content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    @include('layouts.include.left-sidebar')
                    @include('layouts.include.main-content')
                    @include('layouts.include.right-sidebar')
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>



<div class="post-popup job_post">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select>
                                <option>Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="skills" placeholder="Skills">
                    </div>
                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="price1" placeholder="Price">
                            <i class="la la-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select>
                                <option>Full Time</option>
                                <option>Half time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
<!--post-job-popup end-->
@include('layouts.include.chatbox')
@endsection