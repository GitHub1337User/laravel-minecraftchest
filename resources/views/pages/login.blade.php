@extends('layouts.auth')

@section('title','MainChest')

@section('content')


    <form action="{{route('loginUser')}}" method="POST">
        @csrf
        <h3>Авторизация</h3>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" class="button">Войти</button>

        @if($errors->any())
            <ul class="msg-bad">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        @if(session('message'))
            <p class="msg-good">{{session('message')}} </p>
        @endif
    </form>

@endsection
