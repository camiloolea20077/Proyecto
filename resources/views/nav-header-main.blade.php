<nav class="navbar navbar-expand-md navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @can('ver-publicaciones')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('post.index') }}">Publicaciones <span class="sr-only">(current)</span></a>
                </li>
            @endcan
            @can('ver-categorias')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
                </li> 
            @endcan
            @can('ver-usuarios')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
            </li>
           @endcan
           @can('ver-roles')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('role.index') }}">Roles</a>
                </li>
           @endcan
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cuenta
                </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >{{ __('Logout') }}
                </a>     
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </div>
    
</nav>