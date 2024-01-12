@extends('User.layoutUser')
@section('main')

<section class="dash-wrapper">
    <h1>Daftar Artikel</h1>
    <div>
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
        <div class="table-responsive dash-table">
            <h2>Daftar Artikel</h2>
            <div class="p-2">
                <button class="btn btn-primary">
                    <a href="/usr/myblog/create" class="isLight">Buat Baru</a>
                </button>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Likes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Likes</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($myPost as $item)
                        <tr>
                            <td>{{$item->category->name}}</td>
                            <td>
                                <a href="/blog/{{$item->slug}}">
                                    {{$item->title}}
                                </a>
                            </td>
                            <td>{{\Carbon\Carbon::parse($item->createdAt)->format("d-m-Y")}}</td>
                            <td>{{$item->isPost ? "Posting" : "Tidak di posting"}}</td>
                            <td>{{$item->view}}</td>
                            <td>{{$item->like}}</td>
                            <td>
                                @if ($item->isPost)
                                    <a href="/tarik/{{$item->slug}}">
                                        <span class="btn btn-danger edit">
                                            <i>Tarik</i>
                                        </span>
                                    </a>
                                @else
                                    <a href="/posting/{{$item->slug}}">
                                        <span class="btn btn-info edit">
                                            <i>Posting</i>
                                        </span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</section>

@endsection