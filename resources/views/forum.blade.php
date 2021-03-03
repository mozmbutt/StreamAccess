@extends('layouts.theme')
@section('main-content')
    <section class="forum-sec">
        <div class="container">
            <div class="forum-links">
                <ul>
                    <li class="active"><a href="#" title="">Latest</a></li>
                    <li><a href="/ask" title="">Ask</a></li>
                    <li><a href="#" title="">Treading</a></li>
                    <li><a href="#" title="">Popular This Week</a></li>
                    <li><a href="#" title="">Popular of Month</a></li>
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
                                        <img src="images/resources/usrr-img1.png" alt="">
                                    </div>
                                    <div class="usr_quest">
                                        <h3>{{ $thread->title }}</h3>
                                        <span class="quest-posted-time"><i class="fa fa-clock-o"></i>3 min
                                            ago</span>
                                        Posted by <a href="#">{{User::find($thread->user_id)->name }}</a>
                                        @if (Auth::user())
                                            @if (Auth::user()->id === $thread->user_id)
                                                <div class="epi-sec">
                                                    <ul class="bk-links">
                                                        <li> <a {{-- href="{{ route('thread.edit', ['thread' => $thread]) }}" --}}><i class="la la-edit"></i></a></li>
                                                        <li><a href="#" title=""><i class="la la-trash"></i></a></li>
                                                        {{-- <form method="POST" action="{{ route('thread.destroy', ['thread' => $thread]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit">
                                                                <i class="la la-trash"></i>
                                                            </button>
                                                        </form> --}}
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class='body mt-2'>
                                                <p>{{ $thread->body }}</p>
                                            </div>
                                            <div>
                                                <strong>
                                                    <a href='#'>{{ $thread->replies_count }}
                                                        {{ Str::plural('reply', $thread->replies_count) }}</a>
                                                </strong>
                                            </div>
                                            <form method="GET" action="{{ url('/replies') }}">
                                                @csrf
                                                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                                <button class="reply-st" type="submit">
                                                    Add Reply
                                                </button>
                                            </form>
                                        @else
                                            <a href='/login'>Log In</a>
                                        @endif
                                        {{-- <ul class="react-links">
                                        <li><a href="#" title=""><i class="fas fa-heart"></i> Vote 150</a></li>
                                        <li><a href="#" title=""><i class="fas fa-comment-alt"></i> Comments 15</a></li>
                                        <li><a href="#" title=""><i class="fas fa-eye"></i> Views 50</a></li>
                                    </ul> --}}

                                    </div>
                                    <!--usr_quest end-->

                                </div>
                                <!--usr-question end-->
                            </div>
                            <!--forum-questions end-->
                        @empty
                            <p>There are no threads in this category yet. <a href='/ask'>Create
                                    one!</a>
                            </p>
                        @endforelse
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd">Channels</h3>
                            <ul>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="images/resources/m-img1.png" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Jessica William</h3>
                                            <p>Graphic Designer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price1.png" alt="">1185</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="images/resources/m-img2.png" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>John Doe</h3>
                                            <p>PHP Developer</p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price2.png" alt="">1165</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="images/resources/m-img3.png" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Poonam</h3>
                                            <p>Wordpress Developer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price3.png" alt="">1120</span>
                                </li>
                                <li>
                                    <div class="usr-msg-details">
                                        <div class="usr-ms-img">
                                            <img src="images/resources/m-img4.png" alt="">
                                        </div>
                                        <div class="usr-mg-info">
                                            <h3>Bill Gates</h3>
                                            <p>C & C++ Developer </p>
                                        </div>
                                        <!--usr-mg-info end-->
                                    </div>
                                    <span><img src="images/price4.png" alt="">1009</span>
                                </li>
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
