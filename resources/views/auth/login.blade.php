<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>Login | Essensea</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>
<body>
  

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Login</h2>
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autofocus>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">Remember me</label>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>

          <div class="mt-3 text-center">
            <a href="{{ route('register') }}">Belum Punya Akun? Daftar dulu.</a>
          </div>

          @if (Route::has('password.request'))
            <div class="mt-2 text-center">
              <a href="{{ route('password.request') }}">Lupa password?</a>
            </div>
          @endif
        </form>
      </div>
    </div>
  </div>

  @include('partials.footer')
</body>
</html>
