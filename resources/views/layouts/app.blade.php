<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tu bitacora del cannabis, registra tus seguimientos, compara productos y comparte el conocimiento.">
    <meta name="keywords" content="cannabis,seguimientos,marihuana,weed">
    <meta name="author" content="Envolabs Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'weedtracking') }}</title>
    {{-- Vue --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>

  <div id="app" style="">
      @include('layouts.left-sidebar')
      @yield('right-sidebar')
      @include('layouts.header')

      @yield('content')
  </div>

  {{-- Vue --}}
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- extras --}}
  <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
  {{-- template main --}}
  <script src="{{ asset('js/main.js') }}"></script>

  {{-- in page scripts --}}
  @yield('script')



</body>


</html>
