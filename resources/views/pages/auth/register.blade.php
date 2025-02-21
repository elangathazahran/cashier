@extends('pages.auth.layout.main')

@section('auth__content')
    <div class="auth__card__header">
        <img src="{{ asset('images/logo_web.png') }}" alt="Logo web">
        <h2>Create your account</h2>
    </div>
    <form action="{{ route('register') }}" class="form__auth" method="POST">
        @csrf

        {{-- email --}}
        <div class="form__input">
            <label for="email" class="form__label">Email address</label>
            <input type="email" class="form__control" required name="email">
        </div>

        {{-- name --}}
        <div class="form__input">
            <label for="name" class="form__label">Name</label>
            <input type="text" class="form__control" required name="name">
        </div>

        {{-- username --}}
        <div class="form__input">
            <label for="username" class="form__label">Username</label>
            <input type="text" class="form__control" required name="username">
        </div>

        {{-- password --}}
        <div class="form__input">
            <label for="password" class="form__label">Password</label>
            <input type="password" id="password" class="form__control password" required name="password">
        </div>

        {{-- password --}}
        <div class="form__input">
            <label for="password" class="form__label">Confirm password</label>
            <input type="password" class="form__control password" required name="password_confirmation">
        </div>

        <div class="bar__password">
            <label for="status__bar">Your password status: <span id="password-percentage">10%</span></label>
            <div class="bar__password-value">
                <div class="value" id="password-strength-bar"></div>
            </div>
            <small class="description__status" id="password-status-text">
                🔴 Password harus memiliki minimal 8 karakter, mengandung angka, dan simbol (_ - .) untuk mencapai kekuatan maksimal.
            </small>
        </div>

        {{-- see password --}}
        <div class="form__checkbox">
            <input type="checkbox" id="checkbox" class="ui-checkbox">
            <label for="see-password" class="form__checkbox">Show password</label>
        </div>

        <button type="submit" class="btn reg btn__primary" id="submit-btn" disabled>
            <i class="fa-solid fa-right-to-bracket"></i> Sign up
        </button>
    </form>
    <p>
        Already have an account ? <a href="/" class="a__link">Sign in here</a>
    </p>

@endsection