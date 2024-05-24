@extends('layouts.app')

@section('content')
@vite(['resources/css/dashboard.css']) <!-- Link the CSS file using Vite -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboard-container">
    <div class="header-container">
        <h1>Muslim Population Dashboard</h1>
    </div>

    <div class="charts-container">
        <div class="chart">
            <h2>Muslim Population by State</h2>
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart">
            <h2>Population Distribution</h2>
            <canvas id="pieChart"></canvas>
        </div>
        <div class="chart">
            <h2>Muslim Population Over the Years</h2>
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <div class="map-container">
        <h2>Muslim Population Density Map</h2>
        <div id="map"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data
        const data = {
            labels: [
                'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis',
                'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya'
            ],
            datasets: [{
                label: 'Muslim Population',
                data: [3445556, 1876219, 1794142, 828547, 1189734, 1622419, 2449995, 255682, 752882, 1755945, 1001787, 5310915, 1293181, 1371904, 89536, 92419],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Total Population',
                data: [3738670, 2169170, 1903600, 930200, 1226200, 1683700, 2517300, 255700, 1569600, 3922300, 2789400, 6545400, 1298800, 1776500, 103000, 92400],
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Population Distribution',
                    data: data.datasets[0].data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(99, 255, 132, 0.6)',
                        'rgba(235, 162, 54, 0.6)',
                        'rgba(206, 86, 255, 0.6)',
                        'rgba(192, 192, 75, 0.6)',
                        'rgba(102, 255, 153, 0.6)',
                        'rgba(159, 64, 255, 0.6)',
                        'rgba(132, 99, 255, 0.6)',
                        'rgba(54, 235, 162, 0.6)',
                        'rgba(86, 255, 206, 0.6)',
                        'rgba(64, 255, 159, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Line Chart (Population Over the Years)
        const yearlyData = {
            labels: ['2000', '2005', '2010', '2015', '2020'],
            datasets: [{
                label: 'Muslim Population',
                data: [15.6, 17.2, 18.9, 20.5, 22.1], // Example data
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: false,
                tension: 0.1
            }]
        };
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: yearlyData,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Map
        var map = L.map('map').setView([4.2105, 101.9758], 7); // Center of Malaysia

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Custom Red Masjid icon with larger size
        var masjidIcon = L.icon({
            iconUrl: '/assets/images/masjid-icon.png',
            iconSize: [90, 90], // increased size of the icon
            iconAnchor: [32, 64], // point of the icon which will correspond to marker's location
            popupAnchor: [0, -64] // point from which the popup should open relative to the iconAnchor
        });

        // Adding multiple Masjid locations
        var masjidLocations = [
            { lat: 2.9352, lng: 101.6911, name: 'Masjid Putra', address: 'Pusat Pentadbiran Kerajaan Persekutuan, 62502, Putrajaya, Wilayah Persekutuan' },
            { lat: 3.1390, lng: 101.6869, name: 'Masjid Negara', address: 'Kuala Lumpur, Malaysia' },
            { lat: 3.1578, lng: 101.7116, name: 'Masjid Jamek', address: 'Kuala Lumpur, Malaysia' },
            { lat: 3.0853, lng: 101.7505, name: 'Masjid Sultan Salahuddin Abdul Aziz Shah', address: 'Shah Alam, Malaysia' },
            { lat: 5.9788, lng: 116.0735, name: 'Masjid Bandaraya Kota Kinabalu', address: 'Kota Kinabalu, Malaysia' },
            { lat: 1.4927, lng: 103.7414, name: 'Masjid Sultan Abu Bakar', address: 'Johor Bahru, Malaysia' },
            { lat: 6.1248, lng: 100.3679, name: 'Masjid Zahir', address: 'Alor Setar, Malaysia' },
            { lat: 5.4112, lng: 100.3354, name: 'Masjid Kapitan Keling', address: 'George Town, Malaysia' },
            { lat: 2.1960, lng: 102.2406, name: 'Masjid Selat Melaka', address: 'Melaka, Malaysia' },
            { lat: 3.8004, lng: 103.3225, name: 'Masjid Negeri Pahang', address: 'Kuantan, Malaysia' },
            { lat: 3.1710, lng: 101.7007, name: 'Masjid Wilayah Persekutuan', address: 'Kuala Lumpur, Malaysia' },
            { lat: 2.2226, lng: 102.2451, name: 'Masjid Al Azim', address: 'Melaka, Malaysia' },
            { lat: 4.2041, lng: 101.2736, name: 'Masjid Ubudiah', address: 'Kuala Kangsar, Malaysia' },
            { lat: 2.7383, lng: 101.9435, name: 'Masjid Tuanku Mizan Zainal Abidin', address: 'Putrajaya, Malaysia' },
            { lat: 1.8580, lng: 102.9355, name: 'Masjid Jamek Sultan Ismail', address: 'Muar, Malaysia' },
            { lat: 4.8804, lng: 100.7345, name: 'Masjid Kampung Laut', address: 'Kota Bharu, Malaysia' },
            { lat: 5.4123, lng: 100.3307, name: 'Masjid Terapung Tanjung Bungah', address: 'Penang, Malaysia' },
            { lat: 3.1588, lng: 101.7128, name: 'Masjid India', address: 'Kuala Lumpur, Malaysia' },
            { lat: 5.4141, lng: 100.3293, name: 'Masjid Negeri Pulau Pinang', address: 'Penang, Malaysia' },
            { lat: 1.4849, lng: 103.7553, name: 'Masjid Jamek Bandar Muar', address: 'Muar, Malaysia' },
            { lat: 4.5968, lng: 101.0901, name: 'Masjid Sultan Idris Shah II', address: 'Ipoh, Malaysia' },
            { lat: 2.2512, lng: 102.2745, name: 'Masjid Tengkera', address: 'Melaka, Malaysia' },
            { lat: 3.1628, lng: 101.6847, name: 'Masjid Jamek Kampung Baru', address: 'Kuala Lumpur, Malaysia' },
            { lat: 5.9788, lng: 116.0734, name: 'Masjid Al-Kauthar', address: 'Tawau, Malaysia' },
            { lat: 1.4935, lng: 103.7392, name: 'Masjid Jamek', address: 'Johor Bahru, Malaysia' },
            { lat: 3.1496, lng: 101.6898, name: 'Masjid Jamek Al-Hasanah', address: 'Bangi, Malaysia' },
            { lat: 3.0805, lng: 101.7430, name: 'Masjid Al-Muqarrabin', address: 'Bandar Tasik Selatan, Malaysia' },
            { lat: 4.8851, lng: 114.9313, name: 'Masjid Sultan Omar Ali Saifuddin', address: 'Bandar Seri Begawan, Brunei' },
            { lat: 2.9444, lng: 101.6906, name: 'Masjid Uniten', address: 'Kajang, Malaysia' },
            { lat: 3.0740, lng: 101.5188, name: 'Masjid Al-Khairiyah', address: 'Gombak, Malaysia' },
            { lat: 3.0083, lng: 101.4247, name: 'Masjid Ar-Rahman', address: 'Sungai Buloh, Malaysia' },
            { lat: 4.6132, lng: 101.1063, name: 'Masjid Jamek Ipoh', address: 'Ipoh, Malaysia' },
            { lat: 3.1713, lng: 101.7026, name: 'Masjid Tuanku Mizan Zainal Abidin', address: 'Putrajaya, Malaysia' },
            { lat: 2.9222, lng: 101.6520, name: 'Masjid Al-Azhar', address: 'Bangi, Malaysia' },
            { lat: 3.0574, lng: 101.5893, name: 'Masjid Jamek Batu', address: 'Batu Caves, Malaysia' },
            { lat: 3.0337, lng: 101.5350, name: 'Masjid Jamek Kampung Melayu Subang', address: 'Subang, Malaysia' },
            { lat: 2.9988, lng: 101.7072, name: 'Masjid Al-Mustaqim', address: 'Putrajaya, Malaysia' },
            { lat: 2.9186, lng: 101.6503, name: 'Masjid Universiti Kebangsaan Malaysia', address: 'Bangi, Malaysia' },
            { lat: 3.0533, lng: 101.5812, name: 'Masjid Ar-Ridhuan', address: 'Batu Caves, Malaysia' },
            { lat: 2.9220, lng: 101.6568, name: 'Masjid Jamek Bandar Baru Bangi', address: 'Bangi, Malaysia' },
            { lat: 3.0736, lng: 101.6072, name: 'Masjid Jamek As-Salam', address: 'Gombak, Malaysia' },
            { lat: 3.0654, lng: 101.7040, name: 'Masjid Jamek Sultan Abdul Aziz', address: 'Shah Alam, Malaysia' },
            { lat: 2.9178, lng: 101.6515, name: 'Masjid Jamek Kajang', address: 'Kajang, Malaysia' },
            { lat: 3.0484, lng: 101.7652, name: 'Masjid Jamek Ar-Rahimah', address: 'Ampang, Malaysia' },
            { lat: 2.9506, lng: 101.7648, name: 'Masjid Jamek Puchong', address: 'Puchong, Malaysia' },
            { lat: 3.0756, lng: 101.7017, name: 'Masjid Sultan Abdul Aziz', address: 'Shah Alam, Malaysia' },
            { lat: 2.9332, lng: 101.6426, name: 'Masjid Ar-Rahman', address: 'Putrajaya, Malaysia' },
            { lat: 3.0093, lng: 101.6992, name: 'Masjid Jamek Al-Amaniah', address: 'Gombak, Malaysia' },
            { lat: 3.0728, lng: 101.6078, name: 'Masjid Jamek Taman Tun Dr Ismail', address: 'Kuala Lumpur, Malaysia' },
            { lat: 3.1556, lng: 101.6991, name: 'Masjid Jamek Kampung Baru', address: 'Kuala Lumpur, Malaysia' },
            { lat: 3.0859, lng: 101.7495, name: 'Masjid Sultan Salahuddin Abdul Aziz Shah', address: 'Shah Alam, Malaysia' },
            { lat: 3.1628, lng: 101.6847, name: 'Masjid Jamek Kuala Lumpur', address: 'Kuala Lumpur, Malaysia' },
            { lat: 2.9481, lng: 101.7187, name: 'Masjid Al-Hidayah', address: 'Kajang, Malaysia' }
        ];

        masjidLocations.forEach(function(location) {
            L.marker([location.lat, location.lng], { icon: masjidIcon }).addTo(map)
                .bindPopup('<b>' + location.name + '</b><br>' + location.address);
        });
    });
</script>
@endsection
