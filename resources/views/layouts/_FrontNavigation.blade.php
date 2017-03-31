
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @Html.ActionLink("GamerShop", "Index", "Home", new { area = "" }, new { @class = "navbar-brand" })

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @Html.ActionLink("Домашняя страница", "Index", "Home", new { area = "" }, new { @class = "nav-link" })
                </li>
                <li class="nav-item">
                    @Html.ActionLink("О программе", "About", "Home", new { area = "" }, new { @class = "nav-link" })
                </li>
                <li class="nav-item">
                    @Html.ActionLink("Контакт", "Contact", "Home", new { area = "" }, new { @class = "nav-link" })
                </li>
            </ul>
            <form class="form-inline my-2 my-sm-0 float-right">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <ul class="navbar-nav ml-auto float-right">
                @if (Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Логин</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    </li>

                @elseif
                    <li class="nav-item dropdown  float-sm-right">
                        <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                            <a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> Профайл</a>
                            <!--a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Выйти</a-->
                            <a href="{{ route('logout') }}"
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