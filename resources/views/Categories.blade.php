@extends('layouts')
@section("content")

<section title="List Categories" class="py-5 px-3">
    <h1>Daftar Kategori</h1>
    <div class="searching">
        <input placeholder="Cari Kategori" >
    </div>
    <section title="list item category" class="list-art my-5">
        <a href="/artikel/any">
            <article class="cards-category p-2">
                <div class="card-img-category">
                    <img src="/assets/read-boy.png" width="100%" height="100%" >
                    <h2>Tutorial IT</h2>
                </div>
            </article>
        </a>
        <a href="/artikel/any">
            <article class="cards-category p-2">
                <div class="card-img-category">
                    <img src="/assets/read-boy.png" width="100%" height="100%" >
                    <h2>Tutorial Bisnis dan Teknologi</h2>
                </div>
            </article>
        </a>
    </section>
    <section title="Pagination" class="paginate">
        <span class="page-active">1</span>
        <span>2</span>
        <span>3</span>
    </section>
</section>

@endsection