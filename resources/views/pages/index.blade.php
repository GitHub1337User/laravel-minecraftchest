@extends('layouts.app')

@section('title','Minecraft-Chest')
@section('styles')
    <link rel="stylesheet" href={{asset('css/main-menu.css')}}>
@endsection
@section('content')

    <video src={{asset("res/videos/bg-vid2.mp4")}} autoplay muted loop class="bg-vid"></video>
    <div class="wrapper">

        <img src={{asset("res/img/logo.png")}} alt="logo" class="logo" draggable="false">
        <div class="rotate_trick"><h2 class="tricks">With a sauce!</h2></div>
        <div class="buttons">
            <a href={{route('menu')}} class="button">Меню</a>
{{--            <a href="/mainpage.php/?category=textures" class="button">Текстурпаки</a>--}}
{{--            <a href="/mainpage.php/?category=skins" class="button">Скины</a>--}}
{{--            <a href="/mainpage.php/?category=maps" class="button">Карты</a>--}}

        </div>
        <audio id="sound" src={{asset("res/sounds/Click.ogg")}}></audio>
    </div>

@endsection
