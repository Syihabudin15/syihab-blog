@extends('User.layoutUser')
@section("main")

<section class="dash-wrapper">
    <h1>User Setting</h1>
    @if ($msg = Session::get('success'))
        <div class="alert alert-success alert-block" style="width: 300px;margin:20px auto">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $msg }}</strong>
        </div>
    @endif
    <div class="form-setting">
        <form class="is-user-form" action="/usr/setting" method="post">
            @csrf
            @method('put')
            <div class="user-form">
                <label for="name">Nama</label>
                <span>:</span>
                <input value="{{Auth::user()->name}}" name="name" id="name" >
            </div>
            <div class="user-form">
                <label for="email">Email</label>
                <span>:</span>
                <input value="{{Auth::user()->email}}" name="email" id="email" >
            </div>
            <div class="user-form">
                <label for="new_password">New Password</label>
                <span>:</span>
                <input type="password" name="new_password" id="new_password" >
            </div>
            <div class="user-form">
                <label for="password">Old Password</label>
                <span>:</span>
                <input type="password" name="password" id="password">
            </div>
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
            <div class="btn-setting">
                <button type="submit">Update</button>
            </div>
        </form>
        <div class="setting-desc">
            <p>Halaman ini tersedia untuk melakukan perubahan pada akun anda. Apabila anda membutuhkan bantuan lebih lanjut, mohon hubungi admin Syihab Blog</p>
        </div>
    </div>
</section>

@endsection