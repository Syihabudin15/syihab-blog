@extends("layouts")
@section('content')
    
<section title="Create Post" class="create-post-wrap">
    {{-- <form method="post" action="/blog/create" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
        </div>
    </form> --}}
    <textarea id="textarea"></textarea>
</section>

@endsection