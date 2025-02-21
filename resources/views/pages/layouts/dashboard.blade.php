<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashborad | Admin</title>

    {{-- style css --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

    {{-- inter & poppins font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <div class="image">
                <img class="img__brand" src="{{ asset('images/logo_web.png') }}" alt="logo dasboard">
            </div>
            <p>cashier</p>
        </div>
        <nav class="nav__menu">
            <a href="/dashboard" class="nav__link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>dashboard
            </a>
            <a href="/products" class="nav__link {{ request()->is('products') ? 'active' : '' }}">
                <i class="fa-solid fa-shop"></i>produk
            </a>
            <a href="/purchases" class="nav__link {{ request()->is('purchases') ? 'active' : '' }}">
                <i class="fa-solid fa-cart-shopping"></i>pembelian
            </a>
            <a href="/users" class="nav__link {{ request()->is('users') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>user
            </a>
        </nav>
        <div class="logout">
            <button class="btn btn__danger">Logout</button>
        </div>
        <div id="menuToggle" class="menu__toggle-sidebar">
            <input id="checkbox" type="checkbox">
            <label class="toggle" for="checkbox">
                <div class="bar bar--top"></div>
                <div class="bar bar--middle"></div>
                <div class="bar bar--bottom"></div>
            </label>
        </div>
    </aside>

    <section class="section__content">

        {{-- search bar --}}
        <div class="navbar">
            <div class="navbar__content">
                <div id="menuToggle">
                    <input id="checkbox" type="checkbox">
                    <label class="toggle" for="checkbox">
                        <div class="bar bar--top"></div>
                        <div class="bar bar--middle"></div>
                        <div class="bar bar--bottom"></div>
                    </label>
                </div>
                <div class="search__bar">
                    <input type="text" class="form__search" placeholder="What are you looking for?">
                    <i class="fa-solid fa-magnifying-glass search__icon"></i>
                </div>
                <div class="profile__navbar">
                    <p>hello, {{ Auth()->user()->username }}</p>
                    <div class="img__content-navbar">
                        <img src="{{ asset('images/profile.png') }}" alt="img__profile">
                    </div>
                </div>
            </div>
        </div>

        {{-- breadcrumbs --}}
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @if (Request::is('category*'))
                    <li><a href="{{ url('/category') }}">Category</a></li>
                @endif
                <li class="active">{{ ucfirst(Request::segment(1)) }}</li>
            </ul>
        </div>

        {{-- content --}}
        <div class="box__container">
            @yield('content__box')
        </div>
    </section>

    @include('pages.layouts.components.loader')

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
        <script>
            Swal.fire({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    @if (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
        <script>
            Swal.fire({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/d71dac1f06.js" crossorigin="anonymous"></script>

    {{-- script --}}
    <script src="{{ asset('js/dasboard/script.js') }}"></script>
</body>

</html>
