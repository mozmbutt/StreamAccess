@extends('layouts.theme')
@section('main-content')
    <section class="forum-sec">
        <div class="container">
            <div class="forum-links">
                <ul>
                    <li><a href="/forum" title="">Latest</a></li>
                    <li class="active"><a href="/ask" title="">Ask</a></li>
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

    <!<section class="forum-page">
        <form method="POST" action="/threadAdded">
            @csrf

            <!-- Channel -->
            <div>
                <label for='channel_id'>Choose a Channel:</label>
                <select name='channel_id' id='channel_id' class='form-control' required>
                    <option value=''>Choose one</option>
                    @foreach ($channels as $channel)
                        <!-- associate channel id and remember selected channel -->
                        <option value="{{ $channel->id }} {{ old('channel_id') == $channel->id ? 'selected' : '' }}">
                            {{ $channel->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Title -->
            <div>
                <label for='title'>Title:</label>
                <input type='text' class='form-control' name='title' value="{{ old('title') }}" required>
            </div>

            <!-- Body -->
            <div class="mt-4">
                <label for='body'>Body:</label>
                <textarea name='body' id='body' class='form-control' rows='8' required>{{ old('body') }}</textarea>
            </div>

            <!-- Submit -->
            <div class="mt-4">
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
        </section>
        <!--forum-page end-->

        <footer>
            <div class="footy-sec mn" style="position:static; bottom:0px;">
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
