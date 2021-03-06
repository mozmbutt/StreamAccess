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



<div class="post-popup pst-pj job_post">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form action="{{ route('job.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" required name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select required name="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="Geek">Geek</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Lawyer">Lawyer</option>
                                <option value="Islamic Scholor">Islamic Scholor</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Business">Business</option>
                                <option value="Architect">Architect</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="experience" placeholder="Experience">
                    </div>
                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="budget" placeholder="Budget">
                            <i class="la la-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select name="jobType">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea required name="description" placeholder="Description"></textarea>
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