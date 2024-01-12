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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.tiny.cloud/1/xtvpwrhj4bwzk20wrtihrmfqpvck4wgep9xyelz7qbv202k4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript" src='https://cdn.tiny.cloud/1/xtvpwrhj4bwzk20wrtihrmfqpvck4wgep9xyelz7qbv202k4/tinymce/6/tinymce.min.js' referrerpolicy="origin"></script>
        
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
                    <a class="nav-link" title="Home" href="/">
                        <i class="bi bi-house-fill"></i>
                        Home
                    </a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item {{Request::is('usr/dashboard') ? "active" : ""}}">
                        <a class="nav-link" title="Home" href="/usr/dashboard">
                            <i class="bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                        </li>
                    @endif
                    <li class="nav-item {{Request::is('blog') ? "active" : ""}}">
                    <a class="nav-link" title="Daftar Blog" href="/blog">
                        <i class="bi bi-book-half"></i>
                        Blogs
                    </a>
                    </li>
                    <li class="nav-item {{Request::is('categories') ? "active" : ""}}">
                    <a class="nav-link" title="Daftar Kategori" href="/categories">
                        <i class="bi bi-bounding-box"></i>
                        Categories
                    </a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item {{Request::is('auth/register') ? "active" : ""}}">
                            
                            <a class="nav-link text-danger" title="Registration" href="/auth/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>
                        </li>
                    @else
                        <li class="nav-item {{Request::is('auth/register') ? "active" : ""}}">
                            
                            <a class="nav-link text-info" title="Registration" href="/auth/register">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Register
                            </a>
                        </li>
                    @endif
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/js/script.js"></script>
    </body>
</html>