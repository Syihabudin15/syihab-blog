@extends("layouts")
@section('content')
    
<section title="Create Post" class="create-post-wrap">
    {{-- <form method="post" action="/blog/create" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
        </div>
    </form> --}}
    @if ($msg = Session::get('success'))
        <div class="alert alert-success alert-block" style="width: 300px;margin:20px auto">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $msg }}</strong>
        </div>
    @endif
    @if ($msg = Session::get('error'))
        <div class="errors">
            <p>{{$msg}}</p>
        </div>
    @endif

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $msg)
                <li>{{$msg}}</li>
            @endforeach
        </ul>
    @endif
    <form action="/myblog/create" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="input-post">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}" required>
            </div>
            <div class="form-group">
                <label for="excerp">Excerp</label>
                <textarea class="form-control" id="excerp" name="excerp" rows="3" ></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="custom-select" id="category_id" name="category_id">
                    <option selected>Choose...</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input class="form-control" type="text" name="keywords" id="keywords" value="{{old('keywords')}}" placeholder="cara bikin kopi, membuat form input, etc" required>
            </div>
            <div class="form-group">
                <label for="file">Image</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
        </div>
        <div>
            <label for="body"></label>
            <textarea id="textarea" name="body" ></textarea>
        </div>
        <div class="btn-tiny">
            <button type="submit" class="btn btn-primary">Buat Post</button>
        </div>
    </form>
</section>

@endsection