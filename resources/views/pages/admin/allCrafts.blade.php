@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
                <a href="{{route('admin.addCraft')}}" class="btn btn-warning">Добавить крафт</a>
        <table class="table table-secondary table-hover mb-3">
            <thead>
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{session('message')}} </div>
            @endif
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Version</th>
                <th scope="col">Upload date:</th>
                <th scope="col">Actions</th>

            </thead>
            <tbody>
            @foreach($crafts as $craft)

                <tr>
                    <th scope="row">{{$craft->id}}</th>
                    <td>{{$craft->name}}</td>
                    <td>{{$craft->description}}</td>
                    <td>{{$craft->version['version_code']}}</td>
                    <td>{{$craft->created_at}}</td>
                    <td>
                                                <form action="{{route('admin.deleteCraft',$craft->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="confirm('Вы уверены?')" class="btn btn-danger">Del</button>
                                                </form>

                        <a href="{{route('admin.toEditCraft',$craft->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('includes.admin.footer')
@endsection
