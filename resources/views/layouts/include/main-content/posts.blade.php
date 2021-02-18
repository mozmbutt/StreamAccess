<div class="posts-section">
    @include('layouts.include.main-content.top-profiles')
    @foreach($posts as $post)
    <div class="post-bar">
        <div class="post_topbar">
            <div class="usy-dt">
                <img width="50" height="50" src="{{ asset($post->user->userInfo->display_picture ? 'storage/'. $post->user->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}" alt="">
                <div class="usy-name">
                    <h3>{{$post->user->userInfo->first_name . ' ' . $post->user->userInfo->last_name}}</h3>
                    <span><img src="images/clock.png" alt="">{{$post->getCreatedAtAttribute($post->created_at)}}</span>
                </div>
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="{{route('post.edit', $post)}}" class="" title="">Edit Post</a></li>
                    <li><a href="{{url('post/destroy/'.$post->id)}}" title="">Delete</a></li>
                </ul>
            </div>
        </div>
        <div class="epi-sec">
            <ul class="descp">
                <li><img src="/images/icon8.png" alt=""><span>{{$post->user->userInfo->profession}}</span></li>
                <li><img src="/images/icon9.png" alt=""><span>Updated @ {{$post->getUpdatedAtAttribute($post->updated_at)}}</span></li>
            </ul>
            <ul class="bk-links">
                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
            </ul>
        </div>
        <div class="job_descp">
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <ul class="skill-tags">
                @foreach($post->tags as $tag)
                <li><a href="#" title="">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="job-status-bar">
            <ul class="like-com">
                <li>
                    <a href="#" class="com"><i class="fa fa-heart"></i> Like</a>
                </li>
                <li><a href="#" class="com"><i class="fa fa-comment-alt"></i> Comment 15</a></li>
            </ul>
        </div>
    </div>
    <!--post-bar end-->
    @endforeach
    <div class="posty">
        <div class="post-bar no-margin">
            <div class="post_topbar">
                <div class="usy-dt">
                    <img src="images/resources/us-pc2.png" alt="">
                    <div class="usy-name">
                        <h3>John Doe</h3>
                        <span><img src="images/clock.png" alt="">3 min ago</span>
                    </div>
                </div>
                <div class="ed-opts">
                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                    <ul class="ed-options">
                        <li><a href="#" title="">Edit Post</a></li>
                        <li><a href="#" title="">Unsaved</a></li>
                        <li><a href="#" title="">Unbid</a></li>
                        <li><a href="#" title="">Close</a></li>
                        <li><a href="#" title="">Hide</a></li>
                    </ul>
                </div>
            </div>
            <div class="epi-sec">
                <ul class="descp">
                    <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                </ul>
                <ul class="bk-links">
                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                </ul>
            </div>
            <div class="job_descp">
                <h3>Senior Wordpress Developer</h3>
                <ul class="job-dt">
                    <li><a href="#" title="">Full Time</a></li>
                    <li><span>$30 / hr</span></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                <ul class="skill-tags">
                    <li><a href="#" title="">HTML</a></li>
                    <li><a href="#" title="">PHP</a></li>
                    <li><a href="#" title="">CSS</a></li>
                    <li><a href="#" title="">Javascript</a></li>
                    <li><a href="#" title="">Wordpress</a></li>
                </ul>
            </div>
            <div class="job-status-bar">
                <ul class="like-com">
                    <li>
                        <a href="#"><i class="fas fa-heart"></i> Like</a>
                        <img src="images/liked-img.png" alt="">
                        <span>25</span>
                    </li>
                    <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
                </ul>
                <a href="#"><i class="fas fa-eye"></i>Views 50</a>
            </div>
        </div>
        <!--post-bar end-->
        <div class="comment-section">
            <a href="#" class="plus-ic">
                <i class="la la-plus"></i>
            </a>
            <div class="comment-sec">
                <ul>
                    <li>
                        <div class="comment-list">
                            <div class="bg-img">
                                <img src="images/resources/bg-img1.png" alt="">
                            </div>
                            <div class="comment">
                                <h3>John Doe</h3>
                                <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                <p>Lorem ipsum dolor sit amet, </p>
                                <a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
                            </div>
                        </div>
                        <!--comment-list end-->
                        <ul>
                            <li>
                                <div class="comment-list">
                                    <div class="bg-img">
                                        <img src="images/resources/bg-img2.png" alt="">
                                    </div>
                                    <div class="comment">
                                        <h3>John Doe</h3>
                                        <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                        <p>Hi John </p>
                                        <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                    </div>
                                </div>
                                <!--comment-list end-->
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="comment-list">
                            <div class="bg-img">
                                <img src="images/resources/bg-img3.png" alt="">
                            </div>
                            <div class="comment">
                                <h3>John Doe</h3>
                                <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
                                <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                            </div>
                        </div>
                        <!--comment-list end-->
                    </li>
                </ul>
            </div>
            <!--comment-sec end-->
            <div class="post-comment">
                <div class="cm_img">
                    <img src="images/resources/bg-img4.png" alt="">
                </div>
                <div class="comment_box">
                    <form>
                        <input type="text" placeholder="Post a comment">
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
            <!--post-comment end-->
        </div>
        <!--comment-section end-->
    </div>
    <!--posty end-->
    <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!--process-comm end-->
</div>
<!--posts-section end-->