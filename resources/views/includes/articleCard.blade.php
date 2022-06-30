
<section class="article">
    <div class="header-article">
        <a href={{route('article.show',[$article->category['category_eng'], $article])}} > {{$article->title}} </a>
    </div>
    <div class="content-article">
        <img src="{{asset($article->preview)}}" alt="pic" class="article-pic">
        <p class="description">{{$article->content}}</p>
    </div>
    <div class="footer-article"><span>Категория: {{$article->category['category_rus']}}</span> <span>Загружено: {{$article->created_at}}</span> <span>Версия: {{$article->version['version_code']}}</span></div>
</section>
