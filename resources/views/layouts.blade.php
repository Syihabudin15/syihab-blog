<!doctype html>
<html lang="en">
    <head>
        <!-- Include meta tags -->
        @foreach ($metadata["meta"] as $key => $value)
            <meta name="{{$key}}" content="{{$value}}">
        @endforeach
        {{-- End inlude meta tag --}}
        
        <!-- Include meta link -->
        @foreach ($metadata["link"] as $key => $value)
            <link rel="{{$key}}" href="{{$value}}">
        @endforeach
        {{-- End inlude meta link --}}

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/hasAuth.css">
        <link rel="stylesheet" href="/css/userStyle.css">
        
        <title>{{$metadata["title"]}}</title>
    </head>
    <body>

        <nav class="menu-wrapper navbar navbar-expand-lg navbar-light">
            <nav class="sb">SB</nav>
            <div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mynav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{Request::is('/') ? "active" : ""}}">
                    <a class="nav-link" title="Home" href="/">Home</a>
                    </li>
                    <li class="nav-item {{Request::is('usr/dashboard') ? "active" : ""}}">
                    <a class="nav-link" title="Home" href="/usr/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item {{Request::is('blog') ? "active" : ""}}">
                    <a class="nav-link" title="Daftar Blog" href="/blog">Blogs</a>
                    </li>
                    <li class="nav-item {{Request::is('categories') ? "active" : ""}}">
                    <a class="nav-link" title="Daftar Kategori" href="/categories">Categories</a>
                    </li>
                    <li class="nav-item {{Request::is('auth/register') ? "active" : ""}}">
                    <a class="nav-link" title="Registration" href="/auth/register">Register</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        {{-- Content Here --}}
        <div class="content-wrapper">
            @yield('content')
        </div>
        {{-- Content Here --}}

        {{-- Footer --}}
        <footer class="d-flex justify-content-center align-items-center footer">
            <p>Copyright 2022 Syihab Blog. </p>
            <p>Alright Reserved</p>
        </footer>
        {{-- EndFooter --}}

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>