<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js'])
  <title>Document</title>

</head>
<body>
  
  <!-- Nav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href=" ">EssenSea</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">Product</a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('male') }}">Male</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="nav-link" href="{{ route('female') }}">Female</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="nav-link" href="{{ route('unisex') }}">Unisex</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Login</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<br>
<br>
<br>

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

<br>
<br>
  <!-- Card -->

   <div class="container my-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <div class="col">
        <div class="card">
          <img src="https://th.bing.com/th/id/OIP.fTPCp69ZrMbRLWyHTp3iywHaHa?r=0&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5>UnSeen</h5>
            <p class="card-text">Rp.</p>
            <a href="#" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card border-primary">
          <img src="https://th.bing.com/th/id/OIP.fTPCp69ZrMbRLWyHTp3iywHaHa?r=0&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5>UnSeen</h5>
            <p class="card-text">Rp.</p>
            <a href="#" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="https://th.bing.com/th/id/OIP.fTPCp69ZrMbRLWyHTp3iywHaHa?r=0&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5>UnSeen</h5>
            <p class="card-text">Rp.</p>
            <a href="#" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="https://th.bing.com/th/id/OIP.fTPCp69ZrMbRLWyHTp3iywHaHa?r=0&rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5>UnSeen</h5>
            <p class="card-text">Rp.</p>
            <a href="#" class="btn btn-primary">Beli Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- footer -->
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
          <li class="mb-2"><a href="#">Male</a></li>
          <li class="mb-2"><a href="#">Female</a></li>
          <li class="mb-2"><a href="#">Unisex</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>



</body>
</html>