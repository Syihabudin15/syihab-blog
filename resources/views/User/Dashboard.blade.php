@extends('User.layoutUser')
@section('main')

<section class="dash-wrapper">
    <h1>Selamat Datang {{Auth::user()->name}}</h1>
    <div class="dash-list">
        <div class="dash-item text-primary">
            <h3>Total Artikel</h3>
            <p>{{count($all)}}</p>
        </div>
        <div class="dash-item text-success">
            <h3>Di Posting</h3>
            <p>{{$posting}}</p>
        </div>
        <div class="dash-item text-danger">
            <h3>Tidak Di Posting</h3>
            <p>{{$unPost}}</p>
        </div>
    </div>
    <div>
        <div class="table-responsive dash-table">
            <h2>Artikel Terpopuler</h2>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Posted At</th>
                        <th>Views</th>
                        <th>Likes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Posted At</th>
                        <th>Views</th>
                        <th>Likes</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($all as $item)
                        <tr>
                            <td>{{$item->category->name}}</td>
                            <td>
                                <a href="/blog/{{$item->slug}}">
                                    {{$item->title}}
                                </a>
                            </td>
                            <td>{{\Carbon\Carbon::parse($item->updatedAt)->format('d-m-Y')}}</td>
                            <td>{{$item->view}}</td>
                            <td>{{$item->like}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</section>

@endsection