@extends('layouts')
@section("content")

<section title="List Article" class="py-5 px-3">
    <section class="articles">
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
        <div>
            @if ($data->image)
                <div class="art-slug-img">
                    <img src="{{$data->image}}" alt="{{$data->slug}}" width="100%" height="100%">
                </div>
            @endif
            <h1 class="text-center py-4">{{$data->title}}</h1>
            <div class="d-flex justify-content-between align-items-center author-slug">
                <div class="d-flex">
                    <i class="bi bi-person clas"></i>
                    <div class="ml-4">
                        <span class="d-block">{{$data->user->name}}</span>
                        <span>{{\Carbon\Carbon::parse($data->createdAt)->format("d-m-Y")}}</span>
                    </div>
                </div>
                <div>
                    <i class="bi bi-eye-fill"></i>
                    {{$data->view}}
                </div>
            </div>
            <section title="list item category" class="list-art my-5 art-list text-justify px-4" >
                {!!html_entity_decode($data->body)!!}
            </section>
            {{-- Likes --}}
            <div class="likes">
                <div id="like-act" class="d-flex align-items-center">
                    <i class="bi bi-hand-thumbs-up btn-outline-primary"></i>
                    <div class="text-center p-2 ml-3 font-weight-bold" id="like-value">{{$data->like}}</div>
                </div>
                <div id="dislike-act" class="d-flex align-items-center">
                    <i class="bi bi-hand-thumbs-down btn-outline-danger"></i>
                    <div class="text-center p-2 ml-3 font-weight-bold">0</div>
                </div>
            </div>
            {{-- End Likes --}}
            {{-- Tags --}}
            <div>
                <span>#Tags: </span>
                @foreach (explode(',', $data->keywords) as $item)
                    <span class="btn btn-outline-info btn-sm">{{$item}}</span>
                @endforeach
            </div>
            {{-- End Tags --}}
        </div>
        <section title="Short Tools" class="short-tools mt-5">
            <div class="search-tool">
                <h3>Populer</h3>
                <div class="result-search-tools">
                    @foreach ($populer as $item)
                        <a href="/blog/{{$item->slug}}">{{$item->title}}</a>
                    @endforeach
                </div>
                <div class="more">
                    <a href="/blog">more..</a>
                </div>
            </div>
            <div class="search-tool">
                <h3>Hot Kategori</h3>
                <div class="result-search-tools">
                    @foreach ($hot as $item)
                        <a href="/categories/{{$item->slug}}">{{$item->name}}</a>
                    @endforeach
                </div>
                <div class="more">
                    <a href="/categories">more..</a>
                </div>
            </div>
        </section>
    </section>
    <section title="Comments" class="comment-wrap mt-5">
        <h2>Komentar</h2>
        <div>
            <div>
                {{-- Root --}}
                @foreach ($comments as $item)
                    <div class="cmt cmt-root">
                        <div class="img-coment">
                            <i class="bi bi-person"></i>
                        </div>
                        <div >
                            <div class="cmt-author">
                                <span class="d-block name">{{$item->user->name ?? "Anonymous"}}</span>
                                <span class="status">{{$item->user_id == $data->user->id? "Author" : "People"}}</span>
                            </div>
                            <div class="cmt-desc">
                                {{$item->message}}
                            </div>
                        </div>
                    </div>
                    {{-- End Root --}}
                    
                    {{-- Reply --}}
                    @foreach ($item->reply as $reply)
                        <div class="cmt cmt-reply">
                            <div class="img-coment">
                                <i class="bi bi-person"></i>
                            </div>
                            <div >
                                <div class="cmt-author">
                                    <span class="d-block name">{{$reply->user->name ?? "Anonymous"}}</span>
                                    <span class="status">{{$reply->user_id == $data->user->id? "Author" : "People"}}</span>
                                </div>
                                <div class="cmt-desc">
                                    {{$reply->message}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @endforeach
                {{-- End Reply --}}
                <div class="cmt cmt-reply">
                    <div class="img-coment">
                        <i class="bi bi-person"></i>
                    </div>
                    <div >
                        <div>Buat Balasan</div>
                        <form action="/reply" method="POST">
                            @csrf
                            @method("post")
                            <div>
                                <input value="{{$item->id}}" name="comment_id" class="d-none">
                                <textarea name="message" id="message"></textarea>
                            </div>
                            <div class="justify-content-center mt-2">
                                <button class="btn btn-primary" type="submit">Balas</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Input Root--}}
                <div >
                    <div class="cmt cmt-root cmt-input">
                        <div class="img-coment">
                            <i class="bi bi-person"></i>
                        </div>
                        <div >
                            <div>Buat komen</div>
                            <form action="/comment" method="POST">
                                @csrf
                                @method('post')
                                <div>
                                    <input class="d-none" name="post_id" value="{{$data->id}}">
                                    <textarea name="message"></textarea>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" class="btn btn-primary">Komen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End Input Root --}}
            </div>
            <div></div>
        </div>
    </section>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    var data = @json($data);
    $('#like-act').on("click", function(){
        $.ajax({
            type: 'GET',
            url: `http://127.0.0.1:8000/like/${data.slug}`,
            success: function(res) {
                $("#like-value").html(res.data);
            }
        })
    })
    setInterval(() => {
        $.ajax({
            type: 'GET',
            url: `http://127.0.0.1:8000/getlike/${data.slug}`,
            success: function(res) {
                $("#like-value").html(res.data);
            }
        });
    }, 10000);
})
</script>
@endsection