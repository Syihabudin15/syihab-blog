@extends('layouts')
@section("content")

<section title="List Categories" class="py-5 px-3">
    <h1>Daftar Kategori</h1>
    <div class="searching">
        <form method="GET" action="/categories">
            <input placeholder="Cari Kategori" name="search" value="{{request('search')}}">
        </form>
    </div>
    <section title="list item category" class="list-art my-5">
        @foreach ($categories as $category)
        <a href="/categories/{{$category->slug}}">
            <article class="cards-category p-2">
                <div class="card-img-category">
                    <img src="{{$category->image}}" width="100%" height="100%" >
                    <h2>{{$category->name}}</h2>
                </div>
            </article>
        </a>
        @endforeach
    </section>
    <section title="Pagination" class="paginate">
        @for ($i = 1; $i <= $total; $i++)
            <span class="{{request('page') ? request('page') == $i ? "page-active" : "" : "page-active"}}">
                <a class="text-light" href="/categories?page={{$i}}">1</a>
            </span>
        @endfor
    </section>
</section>
<script>
    $.document.on('ready', function (){
        alert("Ready")
    })
</script>
@endsection