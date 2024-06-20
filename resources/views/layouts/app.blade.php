<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mile end training session') }}</title>


    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('includes.links')
</head>

<body>
    <!-- header -->

    @include('includes.header')


    <!-- content -->
    @yield('content')

    @include('includes.footer')


    <!-- scripts -->

    @include('includes.scripts')

    @yield('script')

</body>

</html>