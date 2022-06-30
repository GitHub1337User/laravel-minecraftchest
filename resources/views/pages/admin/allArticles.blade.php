@extends('layouts.admin')

@section('title','MineChest-Admin')

@section('content')
    @include('includes.admin.header')
    <div class="container mt-3 mb-3 flex-lg-row justify-content-xxl-between align-items-center">
        <a href="{{route('admin.addArticle',$category_name)}}" class="btn btn-warning">Добавить арктикль</a>
    <table class="table table-secondary table-hover">
            <thead>
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{session('message')}} </div>
            @endif
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Version</th>
                <th scope="col">Uploaded:</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles[0]->articles as $article)

            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->category['category_rus']}}</td>
                <td>{{$article->title}}</td>
                <td><a href="">{{$article->shortContentAdmin()}}</a></td>
                <td>{{$article->version['version_code']}}</td>
                <td>{{$article->created_at}}</td>
                <td>
                    <form action="{{route('admin.deleteArticle',$article->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="confirm('Вы уверены?')" class="btn btn-danger">Del</button>
                    </form>
                            <a href="{{route('admin.toEditArticle',$article->id)}}" class="btn btn-primary">Edit</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('includes.admin.footer')
@endsection
