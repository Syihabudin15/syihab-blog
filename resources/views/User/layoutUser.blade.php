@extends("layouts")
@section('content')

<div class="my-dashboard">
    {{-- Menu Dashboard --}}
    <section title="Menu Navigaton Dashboard" class="menu-dashboard collapsed" id="menu-wrapper">
        <div>
            <div class="close-icon">
                <div class="anyclass inlined">Main Menu</div>
                <span title="Hide menu bar" onclick="handleCollapse()"><i class="bi bi-list"></i></span>
            </div>
            <div class="p-3">
                <a href="/usr/dashboard">
                    <p class="{{Request::is('usr/dashboard') ? "active-menu" : ""}}">
                        <i class="bi bi-person"></i>
                        <span class="anyclass inlined">Profile</span>
                    </p>
                </a>
                @if (Auth::user()->role == "ADMIN")
                    <a href="/usr/categories">
                        <p class="{{Request::is('usr/myblog') ? "active-menu" : ""}}">
                            <i class="bi bi-bounding-box"></i>
                            <span class="anyclass inlined">Categories</span>
                        </p>
                    </a>
                @endif
                <a href="/usr/myblog">
                    <p class="{{Request::is('usr/myblog') ? "active-menu" : ""}}">
                        <i class="bi bi-book-fill"></i>
                        <span class="anyclass inlined">My Blog</span>
                    </p>
                </a>
                <a href="/usr/setting">
                    <p class="{{Request::is('usr/setting') ? "active-menu" : ""}}">
                        <i class="bi bi-gear"></i>
                        <span class="anyclass inlined">Setting</span>
                    </p>
                </a>
            </div>
        </div>
    </section>
    {{-- End Menu Dashboard --}}
    

    {{-- Content Here --}}
    <section title="Main Dashboard" class="main">
        @yield('main')
    </section>
    {{-- End Content --}}
</div>
<script src="/js/script.js"></script>
@endsection