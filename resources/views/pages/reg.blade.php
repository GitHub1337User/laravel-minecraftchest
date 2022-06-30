@extends('layouts.auth')

@section('title','MainChest')

@section('content')


    <form action="{{route('regUser')}}" method="POST">
        @csrf
        <h3>Регистрация</h3>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="login">Login</label>
        <input type="text" id="login" name="login" required>
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required>
        <label for="password-repeat">Повторите пароль</label>
        <input type="password" id="password-repeat" name="password_confirmation" required>
        <button type="submit" class="button">Зарегестрироваться</button>
        @if($errors->any())
                            <ul class="msg-bad">
                        @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                        @endforeach
                            </ul>
        @endif
    </form>

@endsection
