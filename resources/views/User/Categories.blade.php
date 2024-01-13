@extends("User.layoutUser")
@section("main")

<section class="dash-wrapper">
    <h1>Daftar Kategori</h1>
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
        <div class="table-responsive dash-table">
            <h2>Daftar Kategori</h2>
            <div class="p-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah</button>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <span class="btn btn-info edit" data-toggle="modal" data-target="#editModal" onclick="onEdit('{{$category->id}}','{{$category->name}}')">
                                <i class="bi bi-pencil-square"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade mt-5" id="tambahModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/categories" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" placeholder="SEO" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade mt-5" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/categories" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body" id="edit">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const editModal = document.getElementById("edit");
    function onEdit(id,name,){
        return editModal.innerHTML = `
            <div class="form-group d-none">
                <label for="id">Name</label>
                <input class="form-control" type="text" placeholder="SEO" name="id" id="id" value="${id}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" placeholder="SEO" name="name" id="name" value="${name}">
            </div>
        `
    }
</script>
@endsection