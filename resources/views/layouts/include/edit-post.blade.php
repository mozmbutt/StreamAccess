@extends('layouts.theme')
@section('main-content')
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    @include('layouts.include.left-sidebar')
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <div class="post-project-fields">
                                <form action="{{route('post.update', $post)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="title" value="{{$post->title}}" required placeholder="Title">
                                        </div>
                                        <div class="col-lg-12">
                                            <select class="select2-multi form-control" name="tags[]" multiple="multiple">
                                                @foreach($tags as $tag){
                                                <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                                }
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="body" placeholder="What's on your mind ...">{{$post->body}}</textarea>
                                        </div>
                                        <div class="col-lg-12 cpp-fiel">
                                            <input class="pt-2 doc-input" id="dp" type="file" name="attachment">
                                            <i class="la la-file-photo-o">
                                                <span class="doc-icon-color ml-2">
                                                    Attachment
                                                </span>
                                            </i>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul>
                                                <li><button class="active" type="submit" value="post">Post</button></li>
                                                <li><a href="#" title="">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    @include('layouts.include.right-sidebar')
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.select2-multi').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
        $('.doc-input').change(function() {
            $(this).siblings('i').addClass('text-success');
        });
    })
</script>
<script type="text/script">

    var users = {!! json_encode($tags->toArray())};

 

    console.log(users);

</script>

@endsection