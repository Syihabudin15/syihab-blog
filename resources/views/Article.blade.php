@extends('layouts')
@section("content")

<section title="List Article" class="py-5 px-3">
    <h1>Daftar Artikel</h1>
    <div class="searching">
        <form method="GET" action="/blog">
            <input placeholder="Cari Kategori" name="search" value="{{request('search')}}">
        </form>
    </div>
    <section class="articles">
        <div>
            <section title="list item category" class="list-art my-5 art-list">
                @foreach ($data as $item)
                    <a href="/blog/{{$item->slug}}">
                        <article class="cards p-2">
                            <div class="card-img">
                                @if ($item->image)
                                    <img src="{{$item->image}}" width="100%" height="100%" >
                                @else
                                    <img src="/assets/read-boy.png" width="100%" height="100%" >
                                @endif
                            </div>
                            <div>
                                <h2>{{$item->title}}</h2>
                                <p>{{$item->excerp}}</p>
                            </div>
                        </article>
                    </a>
                @endforeach
            </section>
            <section title="Pagination" class="paginate">
                @for ($i = 1; $i <= $total; $i++)
                <span class="{{(request('page') ? (request('page') == $i ? "page-active" : "text-dark") : ($i == 1 ? "page-active" : "text-dark"))}}">
                    <a class="text-light" id="paginte" href="/blog?page={{$i}}">{{$i}}</a>
                </span>
            @endfor
            </section>
        </div>
        <section title="Short Tools" class="short-tools">
            {{-- <div class="search-tool">
                <input placeholder="cari artikel" id="input" >
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
</section>

@endsection