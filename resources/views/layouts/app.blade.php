<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Manager application</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.png') }}" sizes="16x16">
        <!-- remix icon font css  -->
        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
        <!-- BootStrap css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
        <!-- Apex Chart css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
        <!-- Data Table css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
        <!-- Text Editor css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
        <!-- Date picker css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
        <!-- Calendar css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">
        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
        <!-- Popup css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
        <!-- Slick Slider css -->
        <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>

        @include('layouts.include.nav')

        <main class="dashboard-main">

         @include('layouts.include.header')

            <!-- Page Content -->
            <div>
                {{ $slot }}
            </div>
            @include('layouts.include.footer')

        </main>

        <!-- jQuery library js -->
        <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
        <!-- Apex Chart js -->
        <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
        <!-- Data Table js -->
        <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
        <!-- Iconify Font js -->
        <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
        <!-- jQuery UI js -->
        <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
        <!-- Vector Map js -->
        <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- Popup js -->
        <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
        <!-- Slick Slider js -->
        <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
