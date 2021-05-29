<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Invoice System
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-3">

      <li class="nav-item text-nowrap">
        @auth()

                <span class="text-light">{{ auth()->user()->name }} </span>

            <a class="btn btn-danger" href="{{ route('logout') }}"> Logout</a>

        @else
            <a class="btn btn-success" href="{{ route('login.list') }}">Login</a>

        @endauth
    </li>
    </ul>

  </header>
