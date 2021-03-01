@section('style')
    <style>
        .img-container {
            text-align: center;
            display: block;
        }

    </style>
@endsection
<div class="posts-section">
    @include('layouts.include.main-content.top-profiles')
    @foreach ($posts as $post)
        <div class="post-bar">
            <div class="post_topbar">
                <div class="usy-dt">
                    <img width="50" height="50"
                        src="{{ asset($post->user->userInfo->display_picture ? 'storage/' . $post->user->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                        alt="">
                    <div class="usy-name">
                        <h3>{{ $post->user->userInfo->first_name . ' ' . $post->user->userInfo->last_name }}</h3>
                        <span><img src="images/clock.png"
                                alt="">{{ $post->getCreatedAtAttribute($post->created_at) }}</span>
                    </div>
                </div>
                <div class="ed-opts">
                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                    <ul class="ed-options">
                        <li><a href="{{ route('post.edit', $post) }}" class="" title="">Edit Post</a></li>
                        <li><a href="{{ url('post/destroy/' . $post->id) }}" title="">Delete</a></li>
                    </ul>
                </div>
            </div>
            <div class="epi-sec">
                <ul class="descp">
                    <li><img src="/images/icon8.png" alt=""><span>{{ $post->user->userInfo->profession }}</span></li>
                    <li><img src="/images/icon9.png" alt=""><span>Updated @
                            {{ $post->getUpdatedAtAttribute($post->updated_at) }}</span></li>
                </ul>
                <ul class="bk-links">
                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                </ul>
            </div>
            <div class="job_descp">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
                @if ($post->attachment)
                <div class="mx-auto">
                    {{-- to be set --}}
                    <img class="mb-2" src="{{ asset('storage/' . $post->attachment) }}"
                        alt="{{ asset('images/') }}">
                </div>
                @endif
                <ul class="skill-tags">
                    @foreach ($post->tags as $tag)
                        <li><a href="#" title="">{{ $tag->name }}</a></li>
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
            <div class="comment-section">
                <div class="comment-sec">
                    <ul>
                        <li>
                            <div class="comment-list">
                                {{-- <div class="bg-img">
                                    <img src="images/resources/bg-img1.png" alt="">
                                </div> --}}
                                <div class="comment">
                                    <h3>John Doe</h3>
                                    <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                    <p>Lorem ipsum dolor sit amet, </p>
                                </div>
                            </div>
                            <!--comment-list end-->
                        </li>
                        {{-- <li>
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
                        </li> --}}
                    </ul>
                </div>
                <!--comment-sec end-->
                <div class="post-comment">
                    <div class="cm_img">
                        <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/'. Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}" alt="">
                    </div>
                    <div class="comment_box">
                        <form action="{{ route('comment.store')}}" method="POST" id="commentForm">
                            @csrf
                            <input type="hidden" class="post_id" name="post_id" value="{{$post->id}}">
                            <input type="text" class="comment" name="comment" placeholder="Post a comment">
                            <button type="button" onclick="buttonClick(event)">Send</button>
                        </form>
                    </div>
                </div>
                <!--post-comment end-->
            </div>
        </div>
    <!--post-bar end-->
    @endforeach
    {{--  --}}
    <!--posty end-->
    {{-- <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> --}}
    <!--process-comm end-->
</div>
<!--posts-section end-->
@section('postscomment')
<script>
        function buttonClick(event){
            let post_id = $(event.target).siblings('input.post_id').get(0).value;
            let comment = $(event.target).siblings('input.comment').get(0);
            let csrfToken = $(event.target).siblings().get(0).value;

            const data = {
                _token: csrfToken,
                post_id: post_id,
                comment: comment.value
            }

            axios.post(`/comment`, data)
            .then((response) => {
                console.log(response);
                let comment_post = $(comment).get(0);
                comment_post.value = '';
                let comment_sec = $(comment_post).parent().parent().parent().siblings().get(0);
                $($(comment_sec).find('ul').get(0)).append(embedComment(response.data.user,response.data.timestamp, response.data.comment));
            })
            .catch((error) => {
                console.log(error);
            });
            // const post_id = $('#post_id');
            // console.log(post_id); 
        }

        function embedComment(user, created_at, comment){
            return `<li>
                <div class="comment-list">
                    <div class="comment">
                        <h3>${user}</h3>
                        <span><img src="images/clock.png" alt=""> ${created_at}</span>
                        <p>${comment}</p>
                    </div>
                </div>
            </li>`;
        }
        //    document.addEventListener("DOMContentLoaded", e => {
//         post_comment.addEventListener("click", e => {
//             e.preventDefault();
//             const post_id = parseInt(post_comment.getAttribute("post_id"));
//             const comment = post_comment.getAttribute("comment");
//             console.log(post_id);
//             (function($){
//                 $.ajax({
//                     url: `http://127.0.0.1:8000/comment.store`,
//                     method: "POST",
//                     data: {
//                         _token: "{{ csrf_token() }}",
//                         post_id: post_id
//                         comment: comment
//                     },
//                     success: _r => {
//                         }
//                         // console.log(_r);
//                         // response = JSON.parse(_r);
//                     }
//                 })
//             })(jQuery);
//         })
//     })
</script>
@endsection
