@extends('User.layoutUser')
@section('main')

<section class="dash-wrapper">
    <h1>Daftar Artikel</h1>
    <div>
        <div class="table-responsive dash-table">
            <h2>Daftar Artikel</h2>
            <div class="p-2">
                <button class="btn btn-primary">Buat Baru</button>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Posted At</th>
                        <th>Views</th>
                        <th>Likes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Posted At</th>
                        <th>Views</th>
                        <th>Likes</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Metode Pengembangan</td>
                        <td>System Development Lifecycle</td>
                        <td>11/01/2024</td>
                        <td>2324</td>
                        <td>1320</td>
                        <td>
                            <span class="btn btn-info edit">
                                <i class="bi bi-person"></i>
                            </span>
                            <span class="btn btn-danger edit">
                                <i class="bi bi-person"></i>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</section>

@endsection