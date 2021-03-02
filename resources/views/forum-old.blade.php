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
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @forelse ($threads as $thread)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class='level'>
                                    <h4 class='flex'>
                                        <span class='flex'>
                                            <h4>{{ $thread->title }}</h4>

                                            {{-- {{ App\Models\User::find($thread->user_id)->id }}" --}}
                                            Posted by <a href="#">{{ \App\Models\User::find($thread->user_id)->name }}</a>
                                        </span>
                                    </h4>
                                    <strong>
                                        <a href='#'>{{ $thread->replies_count }}
                                            {{ Str::plural('reply', $thread->replies_count) }}</a>
                                    </strong>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class='body'>
                                    {{ $thread->body }}
                                </div>
                                @if (Auth::user())
                                    @if (Auth::user()->id === $thread->user_id)
                                        <a {{-- href="{{ route('thread.edit', ['thread' => $thread]) }}" --}}>update</a>
                                        <form method="POST" {{-- action="{{ route('thread.destroy', ['thread' => $thread]) }}" --}}>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">
                                                delete
                                            </button>
                                        </form>
                                    @endif
                                    <form method="GET" action="{{ url('/replies') }}">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                        <button type="submit">
                                            add reply
                                        </button>
                                    </form>
                                @else
                                    <a href='/login'>Log In</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>There are no threads in this category yet. <a href='{{ route('thread.create') }}'>Create one!</a>
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--forum-page end-->

    <footer>
        <div class="footy-sec mn no-margin">
            <div class="container">
                <ul>
                    <li><a href="help-center.html" title="">Help Center</a></li>
                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="forum.html" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>
                <p><img src="images/copy-icon2.png" alt="">Copyright 2019</p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>


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
    <!--overview-box end-->
@endsection
