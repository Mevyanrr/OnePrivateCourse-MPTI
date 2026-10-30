<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8"><title>Kuitansi {{ $p->receipt_no }}</title>
<style>body{font-family:'Plus Jakarta Sans',Arial,sans-serif;background:#f2f3ff;margin:0;padding:32px}.c{max-width:560px;margin:auto;background:#fff;border:1px solid #c3c6d7;border-radius:16px;padding:32px}
h1{margin:0 0 4px;color:#004ac6;font-size:20px}.m{color:#434655;font-size:12px}table{width:100%;margin-top:20px;border-collapse:collapse;font-size:13px}td{padding:8px 0;border-bottom:1px dashed #c3c6d7}td:first-child{color:#434655;width:40%}.t{font-size:22px;font-weight:700;color:#131b2e;margin-top:18px}
button{margin-top:20px;padding:10px 18px;border:0;border-radius:10px;background:#2563eb;color:#fff;font-weight:600;cursor:pointer}@media print{button{display:none}body{background:#fff}}</style></head>
<body><div class="c"><h1>One Private Course</h1><div class="m">Kuitansi Pembayaran Les Privat</div>
<table><tr><td>No. Kuitansi</td><td>{{ $p->receipt_no ?: '-' }}</td></tr><tr><td>Invoice</td><td>{{ $p->invoice_no }}</td></tr><tr><td>Siswa</td><td>{{ $p->student->name }} ({{ $p->student->code }})</td></tr>
<tr><td>Wali Murid</td><td>{{ $p->student->guardian_name }}</td></tr><tr><td>Periode</td><td>{{ $p->period }}</td></tr><tr><td>Metode</td><td>{{ $p->method ?: '-' }}</td></tr>
<tr><td>Tanggal Bayar</td><td>{{ $p->paid_at ? \App\Support\Fmt::dateLong($p->paid_at) : '-' }}</td></tr></table>
<div class="t">{{ \App\Support\Fmt::rupiah($p->amount) }} <span style="font-size:13px;color:#047857">{{ $p->status === 'lunas' ? 'LUNAS' : 'BELUM LUNAS' }}</span></div>
<button onclick="window.print()">Cetak</button></div></body></html>
