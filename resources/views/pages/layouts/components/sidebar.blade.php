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
        <a href="/products" class="nav__link {{ request()->is('products*') ? 'active' : '' }}">
            <i class="fa-solid fa-shop"></i>produk
        </a>
        <a href="/purchases" class="nav__link {{ request()->is('purchases*') ? 'active' : '' }}">
            <i class="fa-solid fa-cart-shopping"></i>pembelian
        </a>
        <a href="/users" class="nav__link {{ request()->is('users*') ? 'active' : '' }}">
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