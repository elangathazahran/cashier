@extends('pages.auth.layout.main')

@section('auth__content')
    <div class="auth__card__header">
        <img src="{{ asset('images/logo_web.png') }}" alt="Logo web">
        <h2>Sign in to your account</h2>
    </div>
    <form action="{{ route('login') }}" class="form__auth" method="POST">
        @csrf
        {{-- email --}}
        <div class="form__input">
            <label for="login" class="form__label">Email or username</label>
            <input type="text" class="form__control" required name="login" value="{{ old('login') }}">
        </div>

        {{-- password --}}
        <div class="form__input">
            <div class="label__content-password">
                <label for="password" class="form__label">Password</label>
                <a href="/" class="forgot__password">Forgor password?</a>
            </div>
            <input type="password" class="form__control password" required name="password">
        </div>

        {{-- see password --}}
        <div class="form__checkbox">
            <input type="checkbox" id="checkbox" class="ui-checkbox">
            <label for="see-password" class="form__checkbox">Show password</label>
        </div>

        <button type="submit" class="btn btn__primary">
            <i class="fa-solid fa-right-to-bracket"></i> Sign in
        </button>
    </form>
    <p>
        Not a member ? <a href="/register" class="a__link">Sign up here</a>
    </p>
@endsection