{{-- <x-layouts.app title="QR Code">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Pemerintah Kabupaten Muara Enim</h1>
        <table class="w-full border border-gray-300">
            <tr class="p-4">
                <td class="text-center">
                    <img src="{{ asset("storage/qrcodes/{$item->qr_code}.svg") }}"
                         alt="QR Code"
                         class="w-32 h-32 mx-auto">
                </td>
                
                <td class="align-top">
                    <p><span class="font-semibold text-sm">Nibar</span></p>
                    <p><span class="font-semibold text-sm">Kode Barang</span></p>
                    <p><span class="font-semibold text-sm">Nama Barang</span></p>
                    <p><span class="font-semibold text-sm">Tanggal Perolehan</span></p>
                    <p><span class="font-semibold text-sm">PB</span></p>
                </td>

                <td class="align-top">
                    <p><span class="font-semibold text-sm pr-2">:</span></p>
                    <p><span class="font-semibold text-sm pr-2">:</span></p>
                    <p><span class="font-semibold text-sm pr-2">:</span></p>
                    <p><span class="font-semibold text-sm pr-2">:</span></p>
                    <p><span class="font-semibold text-sm pr-2">:</span></p>
                </td>

                <td class="align-top">
                    <p><span class="font-semibold text-sm">{{ $item->nibar }}</span></p>
                    <p><span class="font-semibold text-sm">{{ $item->kode_barang }}</span></p>
                    <p><span class="font-semibold text-sm">{{ $item->nama_barang }}</span></p>
                    <p><span class="font-semibold text-sm">{{ $item->tanggal_beli }}</span></p>
                    <p><span class="font-semibold text-sm">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</span></p>
                </td>
            </tr>
        </table>
    </div>
</x-layouts.app> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QR Code - {{ $item->nama_barang }}</title>
    <style>
        @page { size: 10cm 4cm; margin: 0; } /* cukup untuk QR + teks */
        body { font-family: sans-serif; font-size: 8px; margin: 0; padding: 0; line-height: 1.2; }

        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            border: 1px solid #333;
        }

        td {
            vertical-align: top;
            padding: 2px;
        }

        .qr {
            width: 2.5cm;
            text-align: center;
        }

        .qr img {
            width: 2.5cm;
            height: 2.5cm;
        }

        .info {
            border: none;
            padding-top: 4px;
        }

        .title {
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            padding: 2px;
        }

        p {
            margin: 0; 
        }

        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="qr">
                <img src="{{ public_path("storage/qrcodes/{$item->qr_code}.svg") }}" alt="QR Code">
            </td>
            <td>
                <table class="info">
                    <tr>
                        <td width="35%"><strong>Nibar</strong></td>
                        <td width="5%">:</td>
                        <td>{{ $item->nibar }}</td>
                    </tr>
                    <tr>
                        <td><strong>Kode Barang</strong></td>
                        <td>:</td>
                        <td>{{ $item->kode_barang }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Barang</strong></td>
                        <td>:</td>
                        <td>{{ $item->nama_barang }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Perolehan</strong></td>
                        <td>:</td>
                        <td>{{ $item->tanggal_beli }}</td>
                    </tr>
                    <tr>
                        <td><strong>PB</strong></td>
                        <td>:</td>
                        <td>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>


