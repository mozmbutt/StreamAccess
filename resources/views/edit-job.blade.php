@extends('layouts.theme')
@section('main-content')

    <section class="forum-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-offset-2">
                    <div class="card card-default">
                        <div class="card-header">Update Job</div>
                        <div class="card-body">
                            <form action="{{ url('job/update' , ['id' => $job->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="form-control1" type="text" required name="title" placeholder="Title" value="{{$job->title}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="inp-field">
                                            <select class="form-control1" required name="category">
                                                <option value="">Select Slug</option>
                                                            <option value="Geek" {{$job->category == 'Geek' ? 'selected' : ''}}>Geek</option>
                                                            <option value="Doctor" {{$job->category == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                                                            <option value="Lawyer" {{$job->category == 'Lawyer' ? 'selected' : ''}}>Laywer</option>
                                                            <option value="Islamic Scholor" {{$job->category == 'Islamic Scholor' ? 'selected' : ''}}>Islamic Scholor</option>
                                                            <option value="Engineer" {{$job->category == 'Engineer' ? 'selected' : ''}}>Engineer</option>
                                                            <option value="Business" {{$job->category == 'Business' ? 'selected' : ''}}>Business</option>
                                                            <option value="Architect" {{$job->category == 'Architect' ? 'selected' : ''}}>Architect</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input class="form-control1" type="text" name="experience" placeholder="Experience" value="{{$job->experience}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="price-br">
                                            <input class="form-control1" type="text" name="budget" placeholder="Budget" value="{{$job->budget}}">
                                            <i class="la la-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inp-field">
                                            <select class="form-control1" name="jobType">
                                                <option {{$job->jobType == 'Full time' ? 'selected' : ''}} value="Full Time">Full Time</option>
                                                <option {{$job->jobType == 'Part time' ? 'selected' : ''}} value="Part Time">Part Time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control1" required name="description" placeholder="Description">{{$job->description}}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul>
                                            <li><button class="form-control1 btn-info" type="submit" value="post">Update</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <style>
       .form-control1{
        line-height: 1em;
        padding: 12px;
        display: block;
        width: 100%;
        margin-bottom: 4px;
       }
   </style>
@endsection
