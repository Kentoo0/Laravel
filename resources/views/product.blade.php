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

  <div class="container py-5">
    <div class="text-center mb-5">
      <img src="{{ asset('images/product.png') }}" alt="About Us" class="img-fluid rounded">
    </div>

  <div class="container my-4">
    <!-- Bagian Male -->
    @include('product.male', ['maleProducts' => $maleProducts])

    <!-- Bagian Female -->
    @include('product.female', ['femaleProducts' => $femaleProducts])

    <!-- Bagian Unisex -->
    @include('product.unisex', ['unisexProducts' => $unisexProducts])
  </div>



  <!-- Footer -->
  

  @include('partials.footer')
</body>
</html>