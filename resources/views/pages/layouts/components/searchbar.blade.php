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