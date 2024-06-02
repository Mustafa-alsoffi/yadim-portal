<template>
    <div style="height: 50px">
        </div>
  <div class="container">
    <div class="row mb-4">
      <div class="col text-center">
        <h1>Muslim Population Dashboard</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5">
        <div class="mb-4">
          <h2>Muslim Population by State</h2>
          <BarChartComponent :chartData="barChartData" :chartOptions="chartOptions" />
        </div>
        <div class="mb-4">
          <h2>Population Distribution</h2>
          <PieChartComponent :chartData="pieChartData" :chartOptions="chartOptions" />
        </div>
        <div class="mb-4">
          <h2>Muslim Population Over the Years</h2>
          <LineChartComponent :chartData="lineChartData" :chartOptions="chartOptions" />
        </div>
      </div>

      <div class="col-md-6">
        <h2>Muslim Population Density Map</h2>
        <div id="map" style="height: 1150px;"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import BarChartComponent from './BarChartComponent.vue';
import PieChartComponent from './PieChartComponent.vue';
import LineChartComponent from './LineChartComponent.vue';

export default {
  components: {
    PieChartComponent,
    LineChartComponent,
    BarChartComponent,
  },
  setup() {
    const barChartData = ref({
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
    });

    const pieChartData = ref({
      datasets: [{
        label: 'Population Distribution',
        data: [3445556, 1876219, 1794142, 828547, 1189734, 1622419, 2449995, 255682, 752882, 1755945, 1001787, 5310915, 1293181, 1371904, 89536, 92419],
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)',
          'rgba(99, 255, 132, 0.6)', 'rgba(235, 162, 54, 0.6)', 'rgba(206, 86, 255, 0.6)',
          'rgba(192, 192, 75, 0.6)', 'rgba(102, 255, 153, 0.6)', 'rgba(159, 64, 255, 0.6)',
          'rgba(132, 99, 255, 0.6)', 'rgba(54, 235, 162, 0.6)', 'rgba(86, 255, 206, 0.6)',
          'rgba(64, 255, 159, 0.6)'
        ]
      }]
    });

    const lineChartData = ref({
      datasets: [{
        label: 'Muslim Population',
        data: [15.6, 17.2, 18.9, 20.5, 22.1],
        borderColor: 'rgba(54, 162, 235, 1)',
        fill: false,
        tension: 0.1
      }]
    });

    const chartOptions = ref({
      responsive: true,
      scales: {
        x: { beginAtZero: true },
        y: { beginAtZero: true }
      }
    });

    onMounted(() => {
      const map = L.map('map').setView([4.2105, 101.9758], 7);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      const masjidIcon = L.icon({
        iconUrl: '/assets/images/masjid-icon.png',
        iconSize: [90, 90],
        iconAnchor: [32, 64],
        popupAnchor: [0, -64]
      });

      const masjidLocations = [
        { lat: 2.9352, lng: 101.6911, name: 'Masjid Putra', address: 'Pusat Pentadbiran Kerajaan Persekutuan, 62502, Putrajaya, Wilayah Persekutuan' },
        { lat: 3.1390, lng: 101.6869, name: 'Masjid Negara', address: 'Kuala Lumpur, Malaysia' },
        { lat: 3.1578, lng: 101.7116, name: 'Masjid Jamek', address: 'Kuala Lumpur, Malaysia' },
      ];

      masjidLocations.forEach(location => {
        const marker = L.marker([location.lat, location.lng], { icon: masjidIcon }).addTo(map)
          .bindPopup('<b>' + location.name + '</b><br>' + location.address);

        marker.on('click', () => {
          updateCharts(location.name);
        });
      });
    });

    return {
      barChartData,
      pieChartData,
      lineChartData,
      chartOptions
    };
  }
};
</script>

<style scoped>
.container {
  max-width: 1200px;
}

h1 {
  margin-bottom: 20px;
}

.chart {
  width: 100%;
  height: 400px;
  margin-bottom: 20px;
}

#map {
  width: 100%;
  height: 500px;
}
</style>
