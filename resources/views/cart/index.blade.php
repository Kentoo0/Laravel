<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Keranjang & Checkout | Essensea</title>
@vite(['resources/js/app.js'])

<!-- Midtrans Snap JS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
@include('partials.navbar')

<div class="container my-5">
    <h1 class="mb-4">Keranjang Belanja</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    @foreach($cart as $id => $item)
    <tr>
        <td>
            <img src="{{ asset($item['image']) }}" width="50" class="me-2" alt="...">
            {{ $item['name'] }}
        </td>
        <td>
            {{ $item['quantity'] }}
        <br>
            <small class="text-muted">Stok tersedia: {{ $item['stock'] }}</small>
        </td>
        <td>Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
        <td>
            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>

    <h3 class="mt-5">Checkout</h3>
    <form id="checkout-form" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" id="address" rows="3" class="form-control" required></textarea>
        </div>
        <button type="button" id="pay-button" class="btn btn-success">Bayar Sekarang</button>
    </form>
    @else
    <p>Keranjang kosong.</p>
    @endif
</div>

@include('partials.footer')

<script>
document.getElementById('pay-button').addEventListener('click', function (e) {
    e.preventDefault();

    const formData = new FormData(document.getElementById('checkout-form'));
    
    fetch("{{ route('cart.checkout') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        snap.pay(data.snap_token, {
            onSuccess: function(result) {
                console.log(result);
                window.location.href = '/checkout/success';
            },
            onPending: function(result) {
                console.log(result);
            },
            onError: function(result) {
                console.log(result);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    })
    .catch(error => {
        console.error(error);
        alert('Gagal memproses pembayaran.');
    });
});
</script>
</body>
</html>
