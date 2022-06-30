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
        <form action="{{route('admin.craftStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="preview" class="form-label">Preview (Превью)</label>
                <input class="form-control" type="file" id="preview" name="preview">
            </div>
            Version
            <select class="form-select" aria-label="Default select example" name="version_id">
                @foreach($versions as $version)
                    <option value="{{$version->id}}" >{{$version->version_code}}</option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    @include('includes.admin.footer')
@endsection
