<div class="post-topbar">
    <div class="user-picy">
        <img class="rounded" src="{{ asset($userInfo->display_picture ? 'storage/'. $userInfo->display_picture : 'images/logo-light-removebg-preview.png') }}" alt="">
    </div>
    <div class="post-st">
        <ul>
            <li><a class="post_project" href="#" title="">New Post</a></li>
        </ul>
    </div>
    <!--post-st end-->
</div>
<!--post-topbar end-->
<div class="post-popup pst-pj" id="postPopup">
    <div class="post-project">
        <h3>What's on your mind ...</h3>
        <div class="post-project-fields">
            <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" required placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <select class="select2-multi form-control" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag){
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="body" placeholder="What's on your mind ..."></textarea>
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
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
<!--post-project-popup end-->

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

@endsection