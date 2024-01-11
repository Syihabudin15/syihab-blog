@extends("layouts")
@section("content")

<section title="Login Form" class="registration-wrapper">
    <h1 class="text-center p-2">Masuk</h1>
    @if ($msg = Session::get('success'))
        <div class="alert alert-success alert-block" style="width: 300px;margin:20px auto">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $msg }}</strong>
        </div>
    @endif
    <div class="form-wrap">
        <div class="form-img">
            <img src="/assets/7.png" width="100%" height="100%" >
        </div>
        <div class="form">
            <form action="/auth/login" method="POST">
                @csrf
                @method("post")
                <div class="form-item mb-3">
                    <label for="email">Email:</label>
                    <input name="email" id="email" required>
                </div>
                <div class="form-item">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input type="checkbox" name="check" id="check">
                    <label for="check" class="check">Ingat login ini?</label>
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
                <div class="btn-wrap">
                    <button type="submit">Kirim</button>
                </div>
            </form>
            <p class="have-acoount">Belum punya akun? <span><a href="/auth/register">Register</a></span></p>
        </div>
    </div>
</section>

@endsection