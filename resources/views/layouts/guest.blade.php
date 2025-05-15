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

    {{ $slot }}


</body>

<x-toaster-hub />

@yield('custom-js')
@include('shared.jsfiles')

</html>
