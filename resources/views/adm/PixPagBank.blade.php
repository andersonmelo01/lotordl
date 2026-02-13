<h1>Pagamento via Pix</h1>

@if(isset($qrCodeUrl))
<p>Escaneie o QR Code abaixo para pagar:</p>
<img src="{{ $qrCodeUrl }}" alt="QR Code PagBank">
<p>Ou use o código Copia e Cola:</p>
<input type="text" value="{{ $qrCodeText }}" readonly>
@else
<p>Ocorreu um erro ao gerar o QR Code.</p>
@endif