<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>Register | Essensea</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>
<body>
  

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Register</h2>
        
        
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" required autofocus>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            required autocomplete="new-password">
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          
          <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Sudah punya akun? Login di sini.</a>
          </div>
        </form>
        <br>
        <div class="text-center mb-3">
          <a href="{{ route('home') }}" class="btn btn-outline-secondary">
           <i class="bi bi-house-door"></i> Kembali ke Beranda
          </a>
        </div>
        <br>
      </div>
    </div>
  </div>
  
  @include('partials.footer')
</body>
</html>
