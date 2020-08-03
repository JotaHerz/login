<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm" >
    <a class="navbar-brand"
                    href="{{ route('Inicio') }}">
                    {{ config('app.name') }}
                </a>

                <button class="navbar-toggler" type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}"
                    ><span class="navbar-toggler-icon"></span>
                </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills">

            <li class="nav-item">
                <a class= "nav-link {{ setActive('Inicio') }}"
                    href="{{ route('Inicio') }}">Inicio
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ setActive('products.*') }}"
                    href="{{ route('products.index') }}">Productos
                </a>
             </li>

            @can('create', new App\Product)
            <li class="nav-item">
                <a class="nav-link {{ setActive('recycling') }}"
                    href="{{ route('recycling') }}">Papelera
                </a>
            </li>
             @endcan

            <li class="nav-item" >
                <a class="nav-link {{ setActive('contact') }}"
                    href="/Contactanos">Contáctanos
                </a>
            </li>

            @auth
            @if(auth::user()->email_verified_at)
            <li class="nav-item" >
                <a class="nav-link {{ setActive('admin.users') }}"
                      href="{{route('admin.users')}}">Usuarios
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                        href="#"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerarr sesión
                </a>
            </li>

            <li class="nav-item" >
                <a class= "nav-link"
                    href="#">{{ auth()->user()->name }}
                </a>
            </li>

            @endif
            @else
            <li class="nav-item" >
                <a class="nav-link {{ setActive('register') }}"
                    href="{{route('register')}}">Registro
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ setActive('login') }}"
                    href="{{route('login')}}">Login
                </a>
            </li>
            @endauth

            <li class="nav-item">
                <form method="GET" action="{{ route('products.index')}}" class="form-inline ml-2">
                    <div class="input-group input-group-sm mt-1">
                        <input class="form-control form-control-navbar form-control-borderless ml-2"
                            name="search"
                            type="search"
                            placeholder="Search"
                        >
                            <div class="input-group-append">
                                <button
                                        class="btn btn-navbar btn btn-primary"
                                        type="submit">Buscar
                                </button>
                            </div>

                    </div>
                </form>
            </li>

        </ul>

    </div>

</nav>

<form
    id="logout-form"
    action="{{ route('logout') }}"
    method="POST"
    style="display: none;">
    @csrf
</form>
