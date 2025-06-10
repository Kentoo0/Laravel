<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<button id="pay-button">Bayar Sekarang</button>

<script>
  document.getElementById('pay-button').addEventListener('click', function () {
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result) {
        console.log(result);
        window.location.href = '/checkout/success';
      },
      onPending: function(result) {
        console.log(result);
      },
      onError: function(result) {
        console.log(result);
      },
    });
  });
</script>
