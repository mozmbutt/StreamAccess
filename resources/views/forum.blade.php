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
                                            <li><a title="" data-toggle="collapse" href="#collapsereply{{ $thread->id }}"
                                                    role="button" aria-expanded="false" aria-controls="collapsereply"><i
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
                                <div class="comment-section collapse" id="collapsereply{{ $thread->id }}">
                                    <div class="comment_sec">
                                        <ul>
                                            @if ($thread->reply)
                                                @foreach ($thread->reply as $reply)
                                                    <li>
                                                        <div class="comment-list">
                                                            <div class="comment">
                                                                <div class="row">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="col-lg-11">
                                                                            <h3>{{ $reply->body }}</h3>
                                                                        </div>
                                                                        <div class="col-lg-1">
                                                                            @if (Auth::check())
                                                                                @if ($reply->user->id == Auth::user()->id)
                                                                                    <div class="ed-opts">
                                                                                        <a href="#" title=""
                                                                                            class="ed-opts-open"><i
                                                                                                class="la la-ellipsis-v"></i></a>
                                                                                        <ul class="ed-options">
                                                                                            <li><a href="" class=""
                                                                                                    title="">Edit
                                                                                                    reply</a></li>
                                                                                            <li>
                                                                                                <form method="POST"
                                                                                                    action="{{ url('/reply/delete', ['id' => $reply->id]) }}">
                                                                                                    @csrf
                                                                                                    <button type="submit">
                                                                                                        Delete
                                                                                                    </button>
                                                                                                </form>
                                                                                                {{-- <a href="" title="">Delete</a> --}}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                @endif
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row col-lg-12 d-flex align-items-center">

                                                                    <p class="mr-1">Replied By:</p><a
                                                                        href="/profile/{{ $reply->user_id }}" title=""><span
                                                                            class="mt-1">{{ $reply->user->name }}</span></a>

                                                                </div>
                                                                <div class="row col-lg-12">
                                                                    <span class=""><img src="/images/clock.png"
                                                                            alt="">{{ $reply->created_at->format('d-m-y') }}</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                    @if (Auth::check())
                                        <div class="post-comment">
                                            {{-- <div class="cm_img">
                                            <img src="{{ asset(Auth::user()->userInfo->display_picture ? 'storage/' . Auth::user()->userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}"
                                                alt="">
                                        </div> --}}
                                            <div class="comment_box" id="reply_box">
                                                <form action="{{ url('/reply/store') }}" method="POST" id="commentForm">
                                                    @csrf
                                                    <input type="hidden" class="thread_id" name="thread_id"
                                                        value="{{ $thread->id }}">
                                                    <input type="text" class="reply " name="reply" placeholder="Post a reply">
                                                    <button type="button" onclick="buttonClick(event)">Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <p>login to reply <a href="{{ route('login') }}">Login</a> </p>
                                    @endif
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
                                                <a href="{{ url('forum', ['id' =>$channel->id]) }}">
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

                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>

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
                console.log(response.data.reply_user_id);
                $($(comment_sec).find('ul').get(0)).append(embedreply(response.data.user, response.data.timestamp,
                    response.data.reply, response.data.reply_user_id, response.data.auth_user_id));
            })
            .catch((error) => {
                console.log(error);
            });
        // const post_id = $('#post_id');
        // console.log(post_id); 
    }

    function embedreply(user, created_at, reply, reply_user_id, auth_user_id) {
        return `<li>
                                <div class="comment-list">
                                    <div class="comment">
                                        <div class="row">
                                            <div class="d-flex justify-content-between">
                                                <div class="col-lg-11">
                                                    <h3>${reply}</h3>
                                                </div>
                                                <div class="col-lg-1">
                                                    @if (`
        $ {
            reply_user_id
        } == $ {
            auth_user_id
        }
        `)
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="" class="" title="">Edit reply</a></li>
                                                                <li><a href="" title="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-lg-12 d-flex align-items-center">
                                            <p class="mr-1">Replied By:</p><a href="/profile/${reply_user_id}"><span class="mt-1">${user}</span></a>
                                        </div>
                                        <div class="row col-lg-12">
                                            <span><img src="/images/clock.png" alt=""> ${created_at}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>`;
    }

</script>
@endsection
