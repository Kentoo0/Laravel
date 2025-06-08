<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>Essensea</title>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
  @include('partials.navbar')

  <div id="carouselExampleDark" class="carousel carousel-dark slide">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('images/essensea.png') }}" alt="Gambar">
      <div class="carousel-caption d-none d-sm-block">
        <p>Dive into Every Scent</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('images/2.png') }}" alt="Gambar">
      <div class="carousel-caption d-none d-sm-block">
        <p>Temukan keajaiban aroma dalam setiap tetes.
Dari kesegaran citrus pagi hari, kelembutan bunga sore, hingga hangatnya kayu saat senja</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/essensea3.png') }}" alt="Gambar">
      <div class="carousel-caption d-none d-sm-block">
        <p>Essensea mengajakmu menyelami dunia wewangian yang terinspirasi dari ketenangan dan kekuatan laut</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>


  <div class="container my-4">
    <h2>Rekomendasi Produk</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach($recommendProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
    </div>
  </div>

  
  <div class="container my-4">
    <h2>Semua Produk</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      @foreach($maleProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
      @foreach($femaleProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
      @foreach($unisexProducts as $product)
        @include('partials.product_card', ['product' => $product])
      @endforeach
    </div>
  </div>

  @include('partials.footer')
</body>
</html>
