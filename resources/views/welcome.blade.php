<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>On Growing</title>
    @include('shared.cssfiles')
</head>

<body>
    <livewire:auth.login />
</body>
@include('shared.jsfiles')

</html>
