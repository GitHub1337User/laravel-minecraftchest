<header>

    <a  href="{{route('index')}}" class="site-logo">
        <img src="/res/img/favicon.png" alt="" class="pic-logo blick"><h1>MINECRAFT  CHEST</h1>
    </a>

    <nav class="buttons sidenav" id="mySidenav">
        <div class="menu-btn">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

            @foreach($categories as $category)
            <a href={{route('mainpage',$category->category_eng)}} class="button">{{$category->category_rus}}</a>
            @endforeach
            <a href={{route('crafts.show')}} class="button">Крафты</a>

        </div>

        <div class="user-btn">


           @auth
                <a class="button button-login" href="{{route('admin.main')}}">{{ Auth::user()->login }}</a>
                <a href = "{{route('logout')}}" class="button button-out" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    Выход</a >
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href = "{{route('login')}}" class="button button-login" > Авторизация</a >
                <a href = "{{route('register')}}" class="button button-reg" > Регистрация</a >
            @endauth


        </div>
    </nav>
    <span class="button-burger" onclick="openNav()">☰</span>


</header>
