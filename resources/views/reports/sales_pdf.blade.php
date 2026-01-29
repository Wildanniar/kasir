<h3>Laporan Penjualan</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
<tr>
    <th>Tanggal</th>
    <th>Kode</th>
    <th>Kasir</th>
    <th>Total</th>
</tr>

@foreach($sales as $s)
<tr>
    <td>{{ $s->created_at->format('d-m-Y') }}</td>
    <td>{{ $s->invoice }}</td>
    <td>{{ $s->user->name }}</td>
    <td>Rp {{ number_format($s->total) }}</td>
</tr>
@endforeach

<tr>
    <th colspan="3">TOTAL</th>
    <th>Rp {{ number_format($total) }}</th>
</tr>
</table>
