@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
{{--        <a href="{{route('admin.addArticle',$category_name)}}" class="btn btn-warning">Добавить арктикль</a>--}}
        <table class="table table-secondary table-hover mb-3">
            <thead>
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{session('message')}} </div>
            @endif
            <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Reg.Date:</th>
                <th scope="col">Actions</th>

            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->login}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role['role_name']}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
{{--                        <form action="{{route('admin.banUser',$user->id)}}" method="post">--}}
{{--                            @csrf--}}
{{--                            @method('delete')--}}
{{--                            <button type="submit" onclick="confirm('Вы уверены?')" class="btn btn-danger">Del</button>--}}
{{--                        </form>--}}

                        <a href="" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('includes.admin.footer')
@endsection
