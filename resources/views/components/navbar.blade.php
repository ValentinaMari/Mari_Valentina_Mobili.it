<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Registrati</a>
          </li>
          
          @endguest
        </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0  pe-5 me-5">
            @auth
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><form action="{{route('logout')}}" method="post">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
                </form></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>