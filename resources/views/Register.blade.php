@extends("layouts")
@section("content")

<section title="Registration Form" class="registration-wrapper">
    <h1 class="text-center p-2">Buat akun baru</h1>
    <div class="form-wrap">
        <div class="form-img">
            <img src="/assets/7.png" width="100%" height="100%" >
        </div>
        <div class="form">
            <form >
                <div class="form-item">
                    <label for="name">Nama:</label>
                    <input name="nama" id="name" required>
                </div>
                <div class="form-item">
                    <label for="email">Email:</label>
                    <input name="email" id="email" required>
                </div>
                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input type="checkbox" name="check" id="check" required>
                    <label for="check" class="check">Setuju dengan semua peraturan dan kebijakan</label>
                </div>
                <div class="btn-wrap">
                    <button>Kirim</button>
                </div>
            </form>
            <p class="have-acoount">Sudah punya akun? <span><a href="/auth/login">Login</a></span></p>
        </div>
    </div>
</section>

@endsection