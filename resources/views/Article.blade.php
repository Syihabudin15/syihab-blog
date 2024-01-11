@extends('layouts')
@section("content")

<section title="List Article" class="py-5 px-3">
    <h1>Daftar Artikel</h1>
    <div class="searching">
        <input placeholder="Cari Artikel" >
    </div>
    <section class="articles">
        <div>
            <section title="list item category" class="list-art my-5 art-list">
                <a href="/artikel/any">
                    <article class="cards p-2">
                        <div class="card-img">
                            <img src="/assets/read-boy.png" width="100%" height="100%" >
                        </div>
                        <div>
                            <h2>Judul Artikel</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, cupiditate.</p>
                        </div>
                    </article>
                </a>
                <a href="/artikel/any">
                    <article class="cards p-2">
                        <div class="card-img">
                            <img src="/assets/read-boy.png" width="100%" height="100%" >
                        </div>
                        <div>
                            <h2>Judul Artikel</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, cupiditate.</p>
                        </div>
                    </article>
                </a>
            </section>
            <section title="Pagination" class="paginate">
                <span class="page-active">1</span>
                <span>2</span>
                <span>3</span>
            </section>
        </div>
        <section title="Short Tools" class="short-tools">
            <div class="search-tool">
                <input placeholder="cari artikel" >
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
            <div class="search-tool">
                <h3>Populer</h3>
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
            <div class="search-tool">
                <h3>Hot Kategori</h3>
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
        </section>
    </section>
</section>

@endsection