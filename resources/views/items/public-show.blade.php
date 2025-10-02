<x-layouts.app>
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
        <table class="w-full border border-gray-300">
            <h1 class="text-2xl font-bold mb-4">{{ $item->nama_barang }}</h1>
            <tr>
                <td class="w-64">
                    <img src="{{ asset('storage/'.$item->foto) }}" class="py-5" alt="Foto {{ $item->nama_barang }}" />
                </td>
                <td>
                    <p class="font-bold">Kategori</p>
                    <p class="font-bold">Kode</p>
                    <p class="font-bold">Lokasi</p>
                    <p class="font-bold">Kondisi</p>
                    <p class="font-bold">Status</p>
                </td>
                <td>
                    <p class="font-bold pr-2">:</p>
                    <p class="font-bold pr-2">:</p>
                    <p class="font-bold pr-2">:</p>
                    <p class="font-bold pr-2">:</p>
                    <p class="font-bold pr-2">:</p>
                </td>
                <td>
                    <p>{{ $item->kategori }}</p>
                    <p>{{ $item->kode_barang }}</p>
                    <p>{{ $item->lokasi }}</p>
                    <p>{{ $item->kondisi?->label() }}</p>
                    <p class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 inset-ring inset-ring-green-600/20">{{ $item->status?->label() }}</p>
                </td>
            </tr>
        </table>
    </div>
</x-layouts.app>
