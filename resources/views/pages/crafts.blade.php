@extends('layouts.app')
@section('styles')
    @include('includes.style')
@endsection
@section('title','MainChest')

@section('content')
    @include('includes.header')
    <div class="body-crafts">
    @foreach($crafts as $craft)
        @include('includes.craftCard',compact('craft'))
    @endforeach
    </div>
    @include('includes.footer')
@endsection
