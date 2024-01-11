@extends("layouts")
@section("content")

<section title="Login Form" class="registration-wrapper">
    <h1 class="text-center p-2">Masuk</h1>
    <div class="form-wrap">
        <div class="form-img">
            <img src="/assets/7.png" width="100%" height="100%" >
        </div>
        <div class="form">
            <form >
                <div class="form-item mb-3">
                    <label for="email">Email:</label>
                    <input name="email" id="email" required>
                </div>
                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input type="checkbox" name="check" id="check" required>
                    <label for="check" class="check">Ingat login ini?</label>
                </div>
                <div class="btn-wrap">
                    <button>Kirim</button>
                </div>
            </form>
            <p class="have-acoount">Belum punya akun? <span><a href="/auth/register">Register</a></span></p>
        </div>
    </div>
</section>

@endsection