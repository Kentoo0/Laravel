<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>Product | Essensea</title>
</head>
<body>
  @include('partials.navbar')

  <div class="container my-4">
    <!-- Bagian Male -->
    @include('product.male', ['maleProducts' => $maleProducts])

    <!-- Bagian Female -->
    @include('product.female', ['femaleProducts' => $femaleProducts])

    <!-- Bagian Unisex -->
    @include('product.unisex', ['unisexProducts' => $unisexProducts])
  </div>

  <div class="container my-4">
    <div class="dropdown mb-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Kategori
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ route('category.show', 'male') }}">Male</a></li>
        <li><a class="dropdown-item" href="{{ route('category.show', 'female') }}">Female</a></li>
        <li><a class="dropdown-item" href="{{ route('category.show', 'unisex') }}">Unisex</a></li>
      </ul>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    <div class="container">
      <div class="d-flex justify-content-between">
        <div class="col-lg-3 mb-3">
          <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="#">
            <span class="fs-5">Essensea</span>
          </a>
          <ul class="list-unstyled small">
            <li class="mb-2">Hawo</li>
          </ul>
        </div>
        <div class="col-lg-2 mb-3 text-end">
          <h5>Kategori</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="{{ route('category.show', 'male') }}">Male</a></li>
            <li class="mb-2"><a href="{{ route('category.show', 'female') }}">Female</a></li>
            <li class="mb-2"><a href="{{ route('category.show', 'unisex') }}">Unisex</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  @include('partials.footer')
</body>
</html>
