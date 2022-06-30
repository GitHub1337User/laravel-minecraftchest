@extends('layouts.app')

@section('title','Minecraft-Chest')
@section('styles')
    <link rel="stylesheet" href={{asset('css/main-menu.css')}}>
@endsection
@section('content')


    <div class="wrapper">

        <div class="buttons">
            @foreach($categories as $category)
            <a href={{route('mainpage',[$category->category_eng])}} class="button">{{$category->category_rus}}</a>
            @endforeach
                <a href={{route('crafts.show')}} class="button">Крафты</a>

        </div>
        <audio id="sound" src={{asset("res/sounds/Click.ogg")}}></audio>
    </div>

@endsection
