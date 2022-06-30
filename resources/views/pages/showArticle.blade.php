@extends('layouts.app')
@section('styles')
    @include('includes.style')
@endsection
@section('title','MainChest')

@section('content')
    @include('includes.header')


    <section class="article">
        <div class="header-article">

            <span data-id={{$article->id}}>{{$article->title}} </span>
        </div>
        <div class="content-article">
            <img src="{{asset($article->preview)}}" alt="pic" class="article-pic">
            <p class="description">{{$article->content}}</p>
        </div>




    @if(!empty($article->sliderImages))
   <div class="slider">

       @foreach($article->sliderImages as $image)
        <div class="item">
            <img src="{{asset($image->image)}}" alt="pic">
            </div>

       @endforeach
        <a class="previous" onclick="previousSlide()">&#10094;</a>
        <a class="next" onclick="nextSlide()">&#10095;</a></div>
    @endif



   <a href="{{$article->download_link}}" class="button-reg button">Скачать</a>
  <div class="footer-article"><span>Категория: {{$article->category['category_rus']}}</span> <span>Загружено: {{$article->created_at}}</span> <span>Версия {{$article->version['version_code']}}</span></div>


        <div class="wrap-comment">
            @auth
              <form action="{{route('addComment',[$article->id, Auth::user()->id])}}" method="POST" class="comment-form">
                  @csrf
                             <label for="comment" class="label-comment">Комментарий</label>
                    <textarea name="comment" id="comment" class="area-comment">
                </textarea>
          <button type="submit" class="button-comment">Отправить</button>
                                </form>
            @else
        <div class="info-comment"><a href="{{route('register')}}">Зарегистрируйтесь</a> или <a href="{{route('login')}}">войдите</a> чтобы оставлять комментарии.</div>
            @endauth


            <div class="comment-zone">
                @if(!empty($article->articleComments))

                        @foreach($article->articleComments as $comment)

                                      <div class="user">
                            <img src="/res/img/avatar-holder.png" alt="">
                                <h4>{{$comment->user['login']}}</h4>

                            </div>
                            <div class="text-comment"><h5>{{$comment->created_at}}</h5>
                            {{$comment->text}}</div>
                        @endforeach
                    @else
                    <div class="info-comment">Комментариев нет </div>
            @endif

            </div>

        </div>

    </section>

    @include('includes.footer')
@endsection
