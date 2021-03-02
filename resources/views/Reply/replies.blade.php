@extends('layouts.theme')
@section('main-content')

<section class="thread-info">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class='level'>
                        <h4 class='flex'>
                            <span class='flex'>
                                <h4>{{ $thread->title }}</h4>
                            
                                Posted by <a href="#">{{ \App\Models\User::find($thread->user_id)->name }}</a>
                            </span>
                        </h4>
                        <strong>
                            <a href='#'>{{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count)}}</a>
                        </strong>
                    </div>
                </div>

                <div class="panel-body">
                    <div class='body'>
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </section>

        <section class="reply-sec" style="margin: 10%">
            <form method="POST"{{--  action="{{ route('reply.store') }}" --}}>
                @csrf
                <textarea name="body" required id="" cols="100" rows="10"></textarea>
                <input type="hidden" name="thread_id" value="{{$thread->id}}">
                <button type="submit">
                    reply
                </button>
            </form>

            @forelse ($replies as $reply)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class='level'>
                        <h4 class='flex'>
                            <span class='flex'>
                                Replied by <a href="#">{{ \App\Models\User::find($reply->user_id)->name }}</a>
                            </span>
                        </h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class='body'>
                        {{ $reply->body }}
                    </div>
                    <div>
                        @if (Auth::user()->id === $reply->user_id)
                            <a href="{{ route('reply.edit', ['reply' => $reply]) }}">update</a>
                            <form method="POST" action="{{ route('reply.destroy', ['reply'=> $reply]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit">
                                    delete
                                </button>
                            </form>
                        @endif
                        @php 
                            if( is_array($reply->likes) && in_array( Auth::user()->id, $reply->likes[$reply->id] ) ) 
                                $status="liked";
                            else $status=""; 
                        @endphp
                        <button class="reply_like_btn" data-reply_id={{$reply->id}} data-status={{$status}}>
                            @if ( is_array($reply->likes) && in_array( Auth::user()->id, $reply->likes[$reply->id] ) )
                                Unlike
                            @else
                                Like
                            @endif
                        </button>
                    </div>
                    
                    
                </div>
            </div>
            @empty
            <p>There are no reply in this thread yet.</p>
            @endforelse
            
            
        </div>
    </div>
</div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", e => {
        const btns = document.querySelectorAll(".reply_like_btn");
        btns.forEach(btn => {
            btn.addEventListener("click", e => {
                e.preventDefault();
                const replyId = parseInt(btn.getAttribute("data-reply_id"));
                const replyStatus = btn.getAttribute("data-status");
                (function($){
                    $.ajax({
                        url: `http://127.0.0.1:8000/reply/${replyId}/like`,
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: replyStatus
                        },
                        success: _r => {
                            if(replyStatus.length) {
                                btn.textContent = "Like"
                                btn.setAttribute("data-status", "");
                            } else {
                                btn.textContent = "Unlike"
                                btn.setAttribute("data-status", "liked");
                            }
                            // console.log(_r);
                            // response = JSON.parse(_r);
                        }
                    })
                })(jQuery);
            })
        })
    })
</script>


@endsection