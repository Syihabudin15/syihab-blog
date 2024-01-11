@extends('User.layoutUser')
@section("main")

<section class="dash-wrapper">
    <h1>User Setting</h1>
    <div class="form-setting">
        <form class="is-user-form">
            <div class="user-form">
                <label>Nama</label>
                <span>:</span>
                <input value="Syihabudin" >
            </div>
            <div class="user-form">
                <label>Email</label>
                <span>:</span>
                <input value="Syihabudintsani15@gmail.com" >
            </div>
            <div class="user-form">
                <label>New Password</label>
                <span>:</span>
                <input type="password" value="Tsani182" >
            </div>
            <div class="user-form">
                <label>Old Password</label>
                <span>:</span>
                <input type="password" value="Tsani182" >
            </div>
            <div class="btn-setting">
                <button>Update</button>
            </div>
        </form>
        <div class="setting-desc">
            <p>Halaman ini tersedia untuk melakukan perubahan pada akun anda. Apabila anda membutuhkan bantuan lebih lanjut, mohon hubungi admin Syihab Blog</p>
        </div>
    </div>
</section>

@endsection