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

        {{-- slick css --}}
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    </head>

    <body>

        @include('pages.layouts.components.sidebar')

        <section class="section__content">

            @include('pages.layouts.components.searchbar')

            @include('pages.layouts.components.breadcrumbs')

            {{-- content --}}
            <div class="box__container">
                @yield('content__box')
            </div>
        </section>

        @include('pages.layouts.components.loader')


        {{-- slick js --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        @yield('script__slick')

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
