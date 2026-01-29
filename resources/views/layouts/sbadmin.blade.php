<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Font Awesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body id="page-top">

<div id="wrapper">

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- CONTENT WRAPPER --}}
    <div id="content-wrapper" class="d-flex flex-column">

        {{-- MAIN CONTENT --}}
        <div id="content">

            {{-- TOPBAR --}}
            @include('layouts.topbar')

            {{-- PAGE CONTENT --}}
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

    </div>
</div>

<!-- JS -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

@stack('js')

</body>
</html>
