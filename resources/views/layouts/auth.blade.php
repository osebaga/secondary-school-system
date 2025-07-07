<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title content defined by individual pages ( a.k.a blades) -->
    @yield('title-content')

    <!-- the favicon is loaded here -->
    {{-- @include('layouts.dependency[favicon]') --}}

    <!-- Fonts -->
    @yield('css')
    <!-- Styles -->
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <style>
        input[type=text]:focus {
            border: 1px solid green;
        }
        input[type=password]:focus {
            border: 1px solid green;
        }
        .btn:hover{
            background-color: white;
            color: green;
        }

        body {
            font-family: "Roboto", sans-serif;
              /* background: #00008b; */
        /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); */
         background-color: #e2e2e2;
/* background-image: linear-gradient(360deg, #FFFFFF 0%, #6284FF 50%, #FF0000 100%); */

              /* padding: 0px; */
              position: absolute;
              width: 100%;
              height: 100%;

          } 
        .invalid-feedback {
            display: block;
        }
    </style>
    <script>
        window.Laravel = '{!! json_encode(['csrfToken' => csrf_token()]) !!}'
    </script>
</head>

<body class="bg-inversex">
    <div class="wrapper-page">

        <main class="py-0">

            @yield('content')
        </main>

    </div>
    <script>
        var resizefunc = [];
    </script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>


    @yield('scripts')

</body>

</html>
