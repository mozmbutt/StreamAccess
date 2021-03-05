@extends('layouts.theme')
@section('main-content')
    <section class="forum-sec">
        <div class="container">
            <div class="forum-links">
                <ul>
                    <li class="active"><a href="{{ route('thread.create') }}" title="">Ask</a></li>
                    <li><a href="{{ route('thread.index') }}" title="">All</a></li>
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
                    <div class="col-lg-8 card ">
                        <div class="card-header mt-2">
                            Ask you question ...
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('thread.store') }}">
                                @csrf
                    
                                <!-- Channel -->
                                <div>
                                    {{-- <label for='channel_id'>Choose a Channel:</label> --}}
                                    <select name='channel_id' id='channel_id' class='form-control mt-2' required>
                                        <option value=''>Choose Channel</option>
                                        @foreach ($channels as $channel)
                                            <!-- associate channel id and remember selected channel -->
                                            <option value="{{ $channel->id }} {{ old('channel_id') == $channel->id ? 'selected' : '' }}">
                                                {{ $channel->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                    
                                <!-- Title -->
                                <div class="mt-2">
                                    {{-- <label for='title'>Title:</label> --}}
                                    <input type='text' class='form-control' name='title' placeholder="Title of query ..." value="{{ old('title') }}" required>
                                </div>
                    
                                <!-- Body -->
                                <div class="mt-2">
                                    {{-- <label for='body'>Body:</label> --}}
                                    <textarea name='body' id='body' class='form-control' placeholder="Type your query ..." rows='8' required>{{ old('body') }}</textarea>
                                </div>
                    
                                <!-- Submit -->
                                <div class="mt-2 card">
                                    <button type='submit' class='btn btn-primary'>Publish</button>
                                </div>
                    
                                @if (count($errors))
                                    <ul class='alert alert-danger'>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                    
                            </form>
                        </div>
                      
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-user">
                            <h3 class="title-wd">Channels</h3>
                            <ul>
                                @foreach ($channels as $channel)
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="{{ asset('images/logo-light.png') }}  " alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <a href="">
                                                    <h3>{{ $channel->name }}</h3>
                                                </a>
                                                <p>{{ $channel->slug }}</p>
                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                        <span><img src="{{ asset('images/price1.png') }}" alt="">1185</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--forum-questions-sec end-->
        </div>
    </section>

    <footer>
        <div class="footy-sec mn" style="position:static; bottom:0px;">
            <div class="container">
                <p><img src="images/copy-icon2.png" alt="">Copyright 2019 - Stream Access</p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>

@endsection
