@extends('layouts.theme')
@section('main-content')
    <section class="forum-sec">
        <div class="container">
            <div class="forum-links">
                <ul>
                    <li><a href="{{ route('thread.create') }}" title="">Ask</a></li>
                    <li class="active"><a href="{{ route('thread.index') }}" title="">All</a></li>
                    <li><a href="{{ route('thread.index') }}?unanswered=1" title="">Unanswered</a></li>
                    <li><a href="{{ route('thread.index') }}?popular=1" title="">Popular</a></li>
                </ul>
            </div>
            <!--forum-links end-->
            <div class="forum-links-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </section>

    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        @forelse ($threads as $thread)
                            <div class="forum-questions">
                                <div class="usr-question">
                                    <div class="usr_img">
                                        <img src="images/logo-light.png" alt="">
                                    </div>
                                    <div class="usr_quest">
                                        <h3>{{ $thread->title }}</h3>
                                        <h5>{{ $thread->body }}</h5>
                                        <ul class="react-links">
                                            <li><a title="" data-toggle="collapse" href="#collapsereply" role="button"
                                                    aria-expanded="false" aria-controls="collapsereply"><i
                                                        class="fas fa-heart"></i>
                                                    {{ Str::plural('reply', $thread->replies_count) }} </a></li>
                                            <li><i class="fas fa-user"></i> <span>Posted By: </span><a
                                                    href="/profile/{{ $thread->user_id }}"
                                                    title="">{{ $thread->user->name }}</a></li>
                                            {{-- <li><a href="#" title=""><i class="fas fa-eye"></i> Views  50</a></li> --}}
                                        </ul>
                                        @if (Auth::user())
                                            @if (Auth::user()->id === $thread->user_id)
                                                <div class="epi-sec ">
                                                    <ul class="quest-tags">
                                                        <li><a href="{{ route('thread.edit', ['thread' => $thread]) }}"
                                                                title="">Edit</a></li>
                                                        <li>
                                                            <form method="POST"
                                                                action="{{ route('thread.destroy', ['thread' => $thread]) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="" type="submit">Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                        {{-- <li><a href="{{ url('/reply/create',['thread_id'=>$thread->id]) }}" title="">Reply</a></li> --}}
                                                    </ul>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <!--usr_quest end-->
                                    <span class="quest-posted-time"><i
                                            class="fa fa-calendar"></i>{{ $thread->created_at->format('d-m-y') }}</span>
                                </div>
                                <div class="comment-section collapse" id="collapsereply">
                                    <div class="comment_sec">
                                        <ul>
                                            @foreach ($thread->reply as $replies)
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="comment">
                                                            <div class="row">
                                                                <h3>{{ $replies->body }}</h3>
                                                                <span class="ml-3 mt-1"><img src="/images/clock.png"
                                                                        alt="">{{ $replies->created_at->format('d-m-y') }}</span>
                                                            </div>
                                                            <p><i class="fas fa-user"></i> <span>Posted By: </span><a
                                                                href="/profile/{{ $replies->user_id }}"
                                                                title="">{{ $replies->user->name }}</a></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="post-comment">
                                        <div class="cm_img">
                                            <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/' . Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                                                alt="">
                                        </div>
                                        <div class="comment_box" id="reply_box">
                                            <form action="{{ url('/reply/store') }}" method="POST" id="commentForm">
                                                @csrf
                                                <input type="hidden" class="thread_id" name="thread_id" value="{{ $thread->id }}">
                                                <input type="text" class="reply " name="reply" placeholder="Post a reply">
                                                <button type="button" onclick="buttonClick(event)">Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--usr-question end-->
                            </div>
                            <!--forum-questions end-->
                        @empty
                            <p>There are no threads in this category yet. <a href='{{ route('thread.create') }}'>Create
                                    one!</a>
                            </p>
                        @endforelse
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd">Channels</h3>
                            <ul>
                                @foreach ($channels as $channel)
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="images/logo-light.png" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <a href="">
                                                    <h3>{{ $channel->name }}</h3>
                                                </a>
                                                <p>{{ $channel->slug }}</p>
                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                        <span><img src="images/price1.png" alt="">1185</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!--widget-user end-->
                        <div class="widget widget-adver">
                            <img src="images/resources/adver-img.png" alt="">
                        </div>
                        <!--widget-adver end-->
                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>
    <!--forum-page end-->
    <div class="overview-box" id="question-box">
        <div class="overview-edit">
            <h3>Ask a Question</h3>
            <form>
                <input type="text" name="question" placeholder="Type Question Here">
                <input type="text" name="tags" placeholder="Tags">
                <textarea placeholder="Description"></textarea>
                <button type="submit" class="save">Submit</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
@endsection
@section('threadsreply')
    <script>
        function buttonClick(event) {
            let thread_id = $(event.target).siblings('input.thread_id').get(0).value;
            let reply = $(event.target).siblings('input.reply').get(0);
            let csrfToken = $(event.target).siblings().get(0).value;

            const data = {
                _token: csrfToken,
                thread_id: thread_id,
                reply: reply.value
            }
            axios.post(`/reply/store`, data)
                .then((response) => {
                    let reply_thread = $(reply).get(0);
                    
                    reply_thread.value = '';
                    let comment_sec = $(reply_thread).parent().parent().parent().siblings().get(0);
                    $($(comment_sec).find('ul').get(0)).append(embedreply(response.data.user, response.data.timestamp,
                        response.data.reply));
                })
                .catch((error) => {
                    console.log(error);
                });
            // const post_id = $('#post_id');
            // console.log(post_id); 
        }

        function embedreply(user, created_at, reply) {
            return `<li>
                        <div class="comment-list">
                            <div class="comment">
                                <h3>${reply}</h3>
                                <span><img src="images/clock.png" alt=""> ${created_at}</span>
                                <p>${user}</p>
                            </div>
                        </div>
                    </li>`;
        }

    </script>
@endsection
