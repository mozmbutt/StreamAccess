@extends('layouts.theme')
@section('main-content')
{{-- {{dd($jobs)}} --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .filter-fields[type="radio"] {
        display: inline-block !important;
    }
</style>
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="filter-secs">
                            <div class="filter-heading">
                                <h3>Filters</h3>
                                <a href="#" title="">Clear all filters</a>
                            </div>
                            <!--filter-heading end-->
                            <div class="paddy">
                                <div class="filter-dd">
                                    <div class="filter-ttl">
                                        <h3>Skills</h3>
                                        <a href="#" title="">Clear</a>
                                    </div>
                                    <input type="text" name="search-skills" placeholder="Search skills" class="filter-fields" id="filter-skill">
                                </div>
                                <div class="filter-dd">
                                    <div class="filter-ttl">
                                        <h3>Job Type</h3>
                                        <a href="#" title="">Clear</a>
                                    </div>
                                    <ul class="avail-checks">
                                        <li>
                                            <label for="filter-job-type-part">
                                                <input type="radio" name="cc" id="filter-job-type-part" class="filter-fields filter-type">
                                                Part Time 
                                            </label>
                                        </li>
                                        <li>
                                            <label for="filter-job-type-full">
                                                <input type="radio" name="cc" id="filter-job-type-full" class="filter-fields filter-type">
                                                Full Time
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-dd">
                                    <div class="filter-ttl">
                                        <h3>Experience Level</h3>
                                        <a href="#" title="">Clear</a>
                                    </div>
                                    <select class="filter-fields" id="filter-exp">
                                        <option value="">Select a experience level</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                    </select>
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </div>
                                <div class="filter-dd">
                                    <div class="filter-ttl">
                                        <h3>Categories</h3>
                                        <a href="#" title="">Clear</a>
                                    </div>
                                    <select class="filter-fields" id="filter-cat">
                                        <option value="">Select Profession</option>
                                        <option value="Geek">Geek</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Lawyer">Lawyer</option>
                                        <option value="Islamic Scholor">Islamic Scholor</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Business">Business</option>
                                        <option value="Architect">Architect</option>
                                    </select>
                                    <input type="hidden" id="logged_in_user_id" value="{{ Auth::user()->id }}">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <!--filter-secs end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="posts-section">
                                @foreach ($jobs as $job)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img width="45px" src="storage/{{App\Models\UserInfo::where('id' , $job->user_id)->first()->display_picture}}" alt="">
                                                <div class="usy-name">
                                                    <h3>{{App\Models\User::where('id' , $job->user_id)->first()->name}}</h3>
                                                    <span><img src="images/clock.png" alt="">{{$job->created_at->format('D-M-Y')}}</span>
                                                </div>
                                            </div>
                                            @if (Auth::user()->id == $job->user_id)
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="{{ url('job/edit', ['id' => $job->id]) }}" title="">Edit</a></li>
                                                        <li><a href="{{ url('job/delete', ['id' => $job->id]) }}" title="">Delete</a></li>
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>{{$job->category}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>{{$job->title}}</h3>
                                            <ul class="job-dt">
                                                <li><a href="#" title="">{{$job->jobType}}</a></li>
                                                <li><span>{{$job->budget}}</span></li>
                                            </ul>
                                            <p>{{$job->description}}</p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">Required Experience: {{$job->experience}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!--posts-section end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="widget widget-about">
                                <img src="/images/logo-light.png" alt="" height="125"  width="100">
                                <h3>Get Jobs on Stream Access</h3>
                                <span>Pay only for the Hours worked</span>
                                <div class="sign_link">
                                    <h3><a href="/forum" title="">Forum</a></h3>
                                    <a href="#" title="">Local Workers</a>
                                </div>
                            </div>
                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
<script>
    (function($) {
        $(document).ready( () => {
            const filterFields = $(".filter-fields");
            filterFields.on("change", e => {
                const skill = $('#filter-skill').val()
                let jobType = '';
                if($('#filter-job-type-part').is(":checked")) {
                    jobType = "part";
                } else if ($('#filter-job-type-full').is(":checked")) {
                    jobType = "full";
                } else {
                    jobType = "";
                }
                const experience = $("#filter-exp").val();
                const category = $("#filter-cat").val();
                const loggedInUserId = $("#logged_in_user_id").val();
                console.log(
                    skill,
                    jobType,
                    experience,
                    category
                )

                $.ajax({
                    url: "api/job/filter",
                    type: "GET",
                    data: {
                        skill,
                        jobType,
                        experience,
                        category,
                        loggedInUserId
                    },
                    success: res => {
                        console.log(res);
                        let html = "";
                        $.each(res, (index, job) => {
                            let authHtml = "";
                            if( job.logged_in_user ) {
                                authHtml += `
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="${job.edit_url}" title="">Edit</a></li>
                                            <li><a href="{${job.delete_url}" title="">Delete</a></li>
                                        </ul>
                                    </div>
                                `;
                            }

                            html += `
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img width="45px" src="${job.display_picture}" alt="">
                                            <div class="usy-name">
                                                <h3>${job.user_name}</h3>
                                                <span><img src="images/clock.png" alt="">${job.created_at}</span>
                                            </div>
                                        </div>
                                        ${authHtml}
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="images/icon8.png" alt=""><span>${job.category}</span></li>
                                        </ul>
                                    </div>
                                    <div class="job_descp">
                                        <h3>${job.title}</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="">${job.jobType}</a></li>
                                            <li><span>${job.budget}</span></li>
                                        </ul>
                                        <p>{{$job->description}}</p>
                                        <ul class="skill-tags">
                                            <li><a href="#" title="">Required Experience: ${job.experience}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            `;
                        })

                        $(".posts-section").html(html);

                    },
                    error: err => {
                        console.log(err);
                    }
                })

            })
        } )
    })(jQuery);
</script>
@endsection