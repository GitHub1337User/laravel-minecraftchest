@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
        @foreach($categories as $category)
{{--            @dd($category)--}}
        <a href="{{route('admin.showByCategory',$category->category_eng)}}" type="button" class="btn btn-primary btn-lg p-4 m-3">{{$category->category_rus}} {{$category->articles->count()}}</a>
        @endforeach
    </div>

    @include('includes.admin.footer')
@endsection
