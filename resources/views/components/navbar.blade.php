<!-- navbar -->
<nav class="navbar navbar-light bg-white py-1">
    <div class="container">
      {{-- <a class="navbar-brand">Creative Coder</a> --}}
      <a class="navbar-brand text-bold" href="/">
        <img src="/img/logotrans.png" alt=""  width="100px">
      </a>
      <div class="d-flex nav">
        <a href="/" class="nav-link  text-dark">Home</a>
        <a href="/#blogs" class="nav-link text-dark">Blogs</a>

        @guest
            <a href="/register" class="nav-link text-dark">Register</a>
            <a href="/login" class="nav-link text-dark">Login</a>
        {{-- <a href="#subscribe" class="nav-link text-dark">Subscribe</a> --}}
        @endguest

        @auth
            @can('admin')
                <a href="/admin/blogs" class="nav-link text-dark">Dashboard</a>
            @endcan
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{auth()->user()->avatar}}" width="30" height="30" class="rounded-circle" alt="">
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="" class="nav-link btn btn-link text-dark text-start">
                            <p class="mb-0">Logged in as </p>
                            <p class="mb-0 fw-bold">{{auth()->user()->username}}</p>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-dark ">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

      </div>
    </div>
  </nav>
