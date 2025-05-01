<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>On Growing</title>



    @include('shared.cssfiles')
    @yield('custom-css')
</head>

<body>
    <div class="main-wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        <div class="page-wrapper">

            @yield('main-content')

            @include('layouts.footer')

        </div>
    </div>

</body>

<x-toaster-hub />

@yield('custom-js')
@include('shared.jsfiles')



</html>
