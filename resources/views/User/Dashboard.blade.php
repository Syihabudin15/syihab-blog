@extends('User.layoutUser')
@section('main')

<section class="dash-wrapper">
    <h1>Selamat Datang {{Auth::user()->name}}</h1>
    <div class="dash-list">
        <div class="dash-item text-primary">
            <h3>Total Artikel</h3>
            <p>5</p>
        </div>
        <div class="dash-item text-success">
            <h3>Di Posting</h3>
            <p>3</p>
        </div>
        <div class="dash-item text-danger">
            <h3>Tidak Di Posting</h3>
            <p>3</p>
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
                    <tr>
                        <td>Metode Pengembangan</td>
                        <td>System Development Lifecycle</td>
                        <td>11/01/2024</td>
                        <td>2324</td>
                        <td>1320</td>
                    </tr>
                </tbody>
            </table>
    </div>
</section>

@endsection