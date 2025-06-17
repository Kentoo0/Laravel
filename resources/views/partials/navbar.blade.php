<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Essensea</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      {{-- Left Side --}}
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('category.show', 'male') }}">Male</a></li>
            <li><a class="dropdown-item" href="{{ route('category.show', 'female') }}">Female</a></li>
            <li><a class="dropdown-item" href="{{ route('category.show', 'unisex') }}">Unisex</a></li>
          </ul>
        </li>
      </ul>

      {{-- Right Side --}}
      <ul class="navbar-nav mb-2 mb-lg-0">
        {{-- Cart --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cart.index') }}">
            <i class="bi bi-cart"></i>
          </a>
        </li>

        {{-- Auth --}}
        @if(Auth::check())

          {{-- Dashboard admin only --}}
          @if(Auth::user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
              </a>
            </li>
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
              @if(Auth::user()->is_admin)
                <span class="badge bg-danger ms-1">Admin</span>
              @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  <i class="bi bi-person"></i> Profile
                </a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
