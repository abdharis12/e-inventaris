<x-filament::page>
    <div class="grid grid-cols-1 gap-6">
        <x-filament::card>
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    Statistik Inventaris
                </h2>

                <div>
                    <canvas id="chartInventaris" height="100"></canvas>
                </div>
            </div>
        </x-filament::card>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('chartInventaris').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Laptop', 'Printer', 'Proyektor', 'Kamera', 'Scanner'],
                    datasets: [{
                        label: 'Jumlah Barang',
                        data: [12, 19, 7, 5, 3],
                        backgroundColor: 'rgba(59, 130, 246, 0.5)',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1,
                        borderRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: 'Jumlah Barang per Kategori' }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</x-filament::page>
