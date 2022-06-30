@extends('layouts.app')
@section('styles')
    @include('includes.style')
@endsection
@section('title','MainChest')

@section('content')
    @include('includes.header')

        @foreach($articles[0]->articles as $article)
             @include('includes.articleCard',compact('article'))
        @endforeach

    @include('includes.footer')
@endsection
