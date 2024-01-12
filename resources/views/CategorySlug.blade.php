@extends('layouts')
@section("content")

<section title="List Article" class="py-5 px-3">
    <h1>Kategori <span style="text-decoration:underline">{{$title}}</span></h1>
    <section class="articles">
        <div>
            <section title="list item category" class="list-art my-5 art-list">
                @foreach ($articles as $art)
                <a href="/blog/{{$art->slug}}">
                    <article class="cards p-2">
                        <div class="card-img">
                            <img src="/assets/read-boy.png" width="100%" height="100%" >
                        </div>
                        <div>
                            <h2>{{$art->title}}</h2>
                            <p>{{$art->excerp}}</p>
                        </div>
                    </article>
                </a>
                @endforeach
            </section>
            <section title="Pagination" class="paginate">
                @for ($i = 1; $i <= $total; $i++)
                    <span class="{{request('page') ? request('page') == $i ? "page-active" : "" : "page-active"}}">
                        <a class="text-light" href="/categories/{{$slug}}?page={{$i}}">1</a>
                    </span>
                @endfor
            </section>
            
        </div>
        <section title="Short Tools" class="short-tools">
            {{-- <div class="search-tool">
                <input placeholder="cari artikel" >
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div> --}}
            <div class="search-tool">
                <h3>Populer</h3>
                <div class="result-search-tools">
                    @foreach ($populer as $pop)
                        <a href="/blog/{{$pop->slug}}">{{$pop->title}}</a>
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
</section>

@endsection