@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
        <a href="{{route('admin.addCategory')}}" class="btn btn-warning">Добавить категорию</a>
        <table class="table table-secondary table-hover mb-3">
            <thead>
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{session('message')}} </div>
            @endif
            <tr>
                <th scope="col">#</th>
                <th scope="col">Rus Name</th>
                <th scope="col">Eng Name</th>
                <th scope="col">Actions</th>


            </thead>
            <tbody>
            @foreach($categories as $category)

                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="{{route('admin.showByCategory',$category->category_eng)}}">{{$category->category_rus}} {{$category->articles->count()}}</a></td>
                    <td>{{$category->category_eng}}</td>
                    <td>
                        <form action="{{route('admin.deleteCategory',$category->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="confirm('Вы уверены?')" class="btn btn-danger">Del</button>
                        </form>

                        <a href="{{route('admin.toEditCategory',$category)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('includes.admin.footer')
@endsection
