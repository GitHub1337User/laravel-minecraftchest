<footer>



    <div><h2>MINECRAFT-CHEST</h2>
        "Minecraft-Chest" - интернет - ресурс посвященный материалам связаннымы с игрой "Minecraft" </div>

    <div class="nav-footer">
        @foreach($categories as $category)
            <a href="{{route('mainpage',$category->category_eng)}}" class="footer-link">{{$category->category_rus}}</a>
        @endforeach
            <a href={{route('crafts.show')}} class="footer-link">Крафты</a>

    </div>
    <div><h2>LICENSE</h2>
        Все материалы использованные на ресурсе взяты из свободных источников и используются в некоммерческих целях.
        <h4>minecraft-chest@gmail.com</h4>
    </div>


</footer>
<script src={{asset('js/burger-menu.js')}}></script>

@if(Route::currentRouteName()=='article.show')
<script defer src={{asset('js/slider.js')}}></script>
@endif
