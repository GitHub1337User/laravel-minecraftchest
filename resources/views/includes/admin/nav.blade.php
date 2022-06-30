<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->login }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Личный кабинет</a></li>
            <li><a class="dropdown-item" href="{{route('admin.users')}}">Упр. пользователями</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a href = "{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    Выход</a >
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.allCategories')) active @endif" aria-current="page" href="{{route('admin.allCategories')}}">Категории</a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('admin.showAll')}}">Все артикли</a>--}}
{{--    </li>--}}
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.crafts')) active @endif " href="{{route('admin.crafts')}}">Крафты</a>
    </li>
</ul>
<form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
