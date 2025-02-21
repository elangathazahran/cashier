<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cashier | {{ $title }}</title>

    {{-- web icon --}}
    <link rel="web icon" type="png" href="{{ asset('images/logo_web.png') }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

    {{-- inter & poppins font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>


    <div class="auth__card">
        @yield('auth__content')
    </div>

    <div class="page-transition">
        <div class="loader-container">
            <div class="loading-text">LOADING</div>
            <div class="loader"></div>
        </div>
    </div>


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

    {{-- script initialized --}}
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
