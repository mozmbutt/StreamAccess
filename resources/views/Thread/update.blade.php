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
                    <div class="panel panel-default">
                        <div class="panel-heading">Update Thread</div>

                        <div class="panel-body">
                            <form method="POST" action='{{ route('thread.update', ['thread' => $thread]) }}'>
                                @method('PUT')
                                @csrf
                                <div class='form-group'>
                                    <label for='title'>Title:</label>
                                    <input type='text' class='form-control' name='title' value="{{ $thread->title }}"
                                        required>
                                </div>

                                <div class='form-group'>
                                    <label for='body'>Body:</label>
                                    <input type='text' class='form-control' name='body' value="{{ $thread->body }}"
                                        required>
                                </div>

                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary'>Update</button>
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
                </div>
            </div>
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
    <!--overview-box end-->
@endsection
