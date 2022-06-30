<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href={{asset("res/img/favicon.png")}} type="image/x-icon">
    @yield('styles')

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
@yield('content')
<!--<div class="bottom-text"><p class="left">www.minecraft.com</p><p class="right">Copyright Mojang AB. Do not distribute!</p></div>-->
</body>
{{--<script src="js/main-menu.js"></script>--}}
<script src={{asset('js/main-menu.js')}}></script>
</html>
