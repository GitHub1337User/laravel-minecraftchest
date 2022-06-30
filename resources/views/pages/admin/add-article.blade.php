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
        <form action="{{route('admin.articleStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Заголовок..." name="title">
            </div>
            <select class="form-select" aria-label="Default select example" name="category">
                @foreach($categories as $category)
                        <option value="{{$category->id}}" {{($category->category_eng==$category_id) ? 'selected' : ''}}>{{$category->category_rus}}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="preview" class="form-label">Preview (Превью)</label>
                <input class="form-control" type="file" id="preview" name="preview">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Pics (Slider)</label>
                <input class="form-control" type="file" id="images" multiple name="images[]">
            </div>
            <div class="mb-3">
                <label for="download_link" class="form-label">Download Link</label>
                <input type="text" class="form-control" id="download_link" placeholder="Ссылка на загрузку..." name="download_link">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    @include('includes.admin.footer')
@endsection
