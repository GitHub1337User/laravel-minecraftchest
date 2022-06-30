@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success" role="alert">{{session('message')}} </div>
        @endif
        <form action="{{route('admin.categoryStore')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="category_rus" class="form-label">Category Name(RU)</label>
                <input type="text" class="form-control" id="category_rus" placeholder="category_rus" name="category_rus">
            </div>
            <div class="mb-3">
                <label for="category_eng" class="form-label">Category Name(ENG)</label>
                <input type="text" class="form-control" id="category_eng" placeholder="category_eng" name="category_eng">
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    @include('includes.admin.footer')
@endsection
