<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/js/app.js'])
  <title>About Us | Essensea</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
  @include('partials.navbar')

  <div class="container py-5">
    <div class="text-center mb-5">
      <img src="{{ asset('images/about us.png') }}" alt="About Us" class="img-fluid rounded">
      <h1 class="display-4 mt-4">About Us</h1>
    </div>

    <section class="mb-5">
      <h2 class="fw-bold">Filosofi di Balik Nama “Essensea”</h2>
      <p class="mt-3">
        Nama Essensea merupakan perpaduan dari dua kata: “essence” dan “sea”.
        Essence menggambarkan inti, esensi, atau jiwa dari sesuatu,
        sedangkan sea melambangkan laut yang luas, misterius, dan penuh kekuatan.
        Bersama-sama, nama ini menjadi simbol dari filosofi kami —
        menghadirkan esensi lautan yang dalam dan tak terbatas ke dalam setiap wewangian.
      </p>
      <p>
        Laut, bagi kami, bukan hanya elemen alam biasa.
        Ia adalah metafora kehidupan manusia: selalu berubah, tak pernah sama dua hari,
        namun tetap memegang karakter dan kedalaman yang sama.
        Parfum Essensea berusaha mencerminkan hal itu — aroma yang tak hanya harum,
        tapi juga mengandung cerita dan kepribadian unik yang bisa menemani pemakainya dalam setiap langkah.
      </p>
      <p>
        Dengan motto “Dive into Every Scent”, kami mengajakmu untuk menyelami setiap aroma,
        menemukan sisi-sisi baru dalam dirimu, dan merasakan pengalaman yang berbeda lewat parfum yang kamu kenakan.
      </p>
    </section>

    <section class="mb-5">
      <h2 class="fw-bold">Tentang Essensea: Menyelami Esensi Laut dalam Setiap Wewangian</h2>
      <p>
        Essensea lahir dari sebuah hasrat sederhana namun kuat:
        menciptakan wewangian yang bukan hanya menyegarkan, tapi juga mampu menceritakan kisah.
        Kisah tentang laut yang luas, angin yang berhembus lembut,
        dan jiwa manusia yang selalu berubah namun tetap autentik.
      </p>
      <p>
        Terinspirasi oleh keindahan alam laut dan keunikan tiap pribadi,
        kami merancang parfum yang menyatu dengan karakter pemakainya.
        Dari semprotan pertama hingga jejak aroma terakhir,
        Essensea hadir untuk menemani perjalanan emosional dan personal setiap individu.
      </p>
      <p>
        Brand ini didirikan oleh sekelompok kreator muda yang memadukan kecintaan terhadap dunia aroma, seni, dan teknologi.
        Semangat eksploratif dan artistik mereka mewujud dalam setiap botol parfum Essensea —
        sebuah kombinasi estetika, kualitas, dan cerita yang mendalam.
      </p>
      <p>
        Namun, Essensea bukan sekadar brand parfum biasa.
        Kami percaya parfum adalah bahasa tanpa kata, medium yang menyampaikan siapa kita sebenarnya tanpa harus diucapkan.
        Melalui berbagai varian aroma — dari kelembutan bunga laut, kedalaman kayu oud, hingga kehangatan sinar pantai sore —
        Essensea mengajak semua orang, tanpa batas gender maupun karakter, untuk menemukan dan mengekspresikan diri mereka.
      </p>
    </section>
  </div>

  @include('partials.footer')
</body>
</html>
