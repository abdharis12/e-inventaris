<x-layouts.app>
    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $item->nama_barang }}</h1>

        <p><strong>Kategori:</strong> {{ $item->kategori }}</p>
        <p><strong>Kode:</strong> {{ $item->kode_barang }}</p>
        <p><strong>Keterangan:</strong> {{ $item->lokasi }}</p>
        <p><strong>Kondisi:</strong> {{ $item->kondisi?->label() }}</p>
        <p><strong>Status:</strong> {{ $item->status?->label() }}</p>
        <img src="{{ asset('storage/'.$item->foto) }}" alt="Foto {{ $item->nama_barang }}" />
    </div>
</x-layouts.app>
