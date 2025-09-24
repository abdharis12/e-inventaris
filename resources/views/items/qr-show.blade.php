<x-layouts.app>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Pemerintah Kabupaten Muara Enim</h1>
        <table class="w-full border border-gray-300">
            <tr>
                {{-- Kolom Kiri: QR Code --}}
                <td class="p-4 text-center">
                    <img src="{{ asset("storage/qrcodes/{$item->qr_code}.svg") }}"
                         alt="QR Code"
                         class="w-20 h-20 mx-auto">
                </td>
                
                <td class="p-4 align-top">
                    <p><span class="font-semibold">Nibar</span></p>
                    <p><span class="font-semibold">Kode Barang</span></p>
                    <p><span class="font-semibold">Nama Barang</span></p>
                    <p><span class="font-semibold">Tanggal Perolehan</span></p>
                    <p><span class="font-semibold">PB</span></p>
                </td>

                <td class="p-4 align-top">
                    <p><span class="font-semibold">:</span></p>
                    <p><span class="font-semibold">:</span></p>
                    <p><span class="font-semibold">:</span></p>
                    <p><span class="font-semibold">:</span></p>
                    <p><span class="font-semibold">:</span></p>
                </td>

                <td class="p-4 align-top">
                    <p>{{ $item->nibar }}</p>
                    <p>{{ $item->kode_barang }}</p>
                    <p>{{ $item->nama_barang }}</p>
                    <p>{{ $item->tanggal_beli }}</p>
                    <p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>
                </td>
            </tr>
        </table>
    </div>
</x-layouts.app>
