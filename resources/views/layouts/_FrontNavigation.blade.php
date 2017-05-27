
<nav class="navbar navbar-toggleable-sm navbar-inverse bg-indigo">
    <div class="container">
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="app-logo">{{ config('app.name', 'Platest') }}</span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">

                <li class="nav-item">
                    @php
                        $url = 'documents/create';
                        $isActive = Request::is($url) ? " active" : "";
                    @endphp
                    <a href="{{ url($url) }}" class="nav-link {{$isActive}}">Загрузить</a>
                </li>

                <li class="nav-item">
                    @php
                        $url = 'documents';
                        $isActive = Request::is($url) ? " active" : "";
                    @endphp
                    <a href="{{ url($url) }}" class="nav-link {{$isActive}}">Документы</a>
                </li>

                <li class="nav-item">
                    @php
                        $url = 'about';
                        $isActive = Request::is($url) ? " active" : "";
                    @endphp
                    <a href="{{ url($url) }}" class="nav-link {{$isActive}}">О портале</a>
                </li>

                <li class="nav-item">
                    @php
                        $url = 'donate';
                        $isActive = Request::is($url) ? " active" : "";
                    @endphp
                    <a href="{{ url($url) }}" class="nav-link {{$isActive}}">Поддержать проект</a>
                </li>

                <li class="nav-item">
                    @php
                        $url = 'results';
                        $isActive = Request::is($url) ? " active" : "";
                    @endphp
                    <a href="{{ url($url) }}" class="nav-link {{$isActive}}">Итоги летней сессии</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto float-md-right">
                @if (Auth::guest())

                    @if(env('APP_DEBUG'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Логин</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif


                @else

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-lock" aria-hidden="true"></i> Админка
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            {{ link_to_action('DocumentController@index', 'Документы', [], ['class' => 'dropdown-item']) }}
                            {{ link_to_action('UserController@index', 'Пользователи', [], ['class' => 'dropdown-item']) }}

                        </div>
                    </li>

                    <li class="nav-item dropdown  float-md-right">
                        <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                            <a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> Профайл</a>
                            <!--a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Выйти</a-->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Выйти</a>
                        </div>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>