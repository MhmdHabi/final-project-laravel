@extends('layouts.master')

@section('judul', 'Beranda')

@section('content')

    <div class="shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] p-3 rounded">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold sm:text-lg md:text-xl">INDEKS PRESTASI / GRADE POINT</h1>
        </div>
        <canvas id="ipChart"></canvas>
    </div>

    <style>
        /* CSS untuk membuat chart responsif */
        @media (max-width: 768px) {
            .chart-container {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <script>
        // Data IP per semester (contoh data)
        const ipData = {!! json_encode($ipData) !!};

        // Ekstraksi label dan data dari data IP
        const labels = ipData.map(data => data.semester);
        const data = ipData.map(data => data.ip);

        // Inisialisasi chart
        const ctx = document.getElementById('ipChart').getContext('2d');
        const ipChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Indeks Prestasi',
                    data: data,
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 1, // Rentang nilai IP dari 1 hingga 4
                        max: 4
                    }
                }
            }
        });
    </script>
@endsection
