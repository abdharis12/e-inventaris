<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QR Code - {{ $item->nama_barang }}</title>
    <style>
        @page { margin: 0; }
        body {
            width: 300pt;   /* ≈10.5 cm */
            height: 140pt;  /* ≈4.9 cm */
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: sans-serif;
            font-size: 8pt;
            line-height: 1.2;
        }

        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            border: none;
        }

        td {
            vertical-align: top;
            border: none;
            padding: 0;
        }

        .qr {
            text-align: center;
        }

        .qr img {
            width: 45pt;
            height: 45pt;
            display: block;
            margin: 0 auto;
        }

        .info {
            padding-left: 6pt;
            word-wrap: break-word;
        }

        .info table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        .info td {
            padding: 1pt;
            border: none;
            vertical-align: top;
        }

        * {
            page-break-before: avoid !important;
            page-break-after: avoid !important;
            page-break-inside: avoid !important;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            {{-- width absolut, bukan hanya CSS --}}
            <td class="qr" width="60">
                @php
                    $path = storage_path('app/public/qrcodes/' . $item->qr_code . '.svg');
                    $qrBase64 = file_exists($path)
                        ? base64_encode(file_get_contents($path))
                        : null;
                @endphp

                @if ($qrBase64)
                    <img src="data:image/svg+xml;base64,{{ $qrBase64 }}" alt="QR Code">
                @else
                    <p>QR tidak ditemukan</p>
                @endif
            </td>
            <td class="info" width="240">
                <table>
                    <tr><td width="35%"><strong>Nibar</strong></td><td width="5%">:</td><td>{{ $item->nibar }}</td></tr>
                    <tr><td><strong>Kode Barang</strong></td><td>:</td><td>{{ $item->kode_barang }}</td></tr>
                    <tr><td><strong>Nama Barang</strong></td><td>:</td><td>{{ $item->nama_barang }}</td></tr>
                    <tr><td><strong>Tanggal Perolehan</strong></td><td>:</td><td>{{ $item->tanggal_beli }}</td></tr>
                    <tr><td><strong>PB</strong></td><td>:</td><td>DPMPTSP</td></tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
