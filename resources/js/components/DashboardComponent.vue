<template>
  <div style="height: 50px"></div>
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
      labels: ['January', 'February', 'March'],
      datasets: [
        {
          data: [40, 20, 12],
          backgroundColor: ['#f87979', '#a6c1ee', '#f87979'],
        }
      ]
    });

    const pieChartData = ref({
      labels: ['Group 1', 'Group 2', 'Group 3'],
      datasets: [
        {
          data: [30, 50, 20],
          backgroundColor: ['#f87979', '#a6c1ee', '#f87979'],
        }
      ]
    });

    const lineChartData = ref({
      labels: ['2018', '2019', '2020'],
      datasets: [
        {
          data: [65, 59, 80],
          borderColor: '#f87979',
          fill: false,
        }
      ]
    });

    const chartOptions = ref({
      responsive: true,
      scales: {
        x: { beginAtZero: true },
        y: { beginAtZero: true }
      }
    });

    const updateCharts = (locationName) => {
      if (locationName === 'Masjid Putra') {
        barChartData.value = {
          labels: ['April', 'May', 'June'],
          datasets: [
            {
              data: [30, 50, 70],
              backgroundColor: ['#42b983', '#a6c1ee', '#f87979'],
            }
          ]
        };
        pieChartData.value = {
          labels: ['Group A', 'Group B', 'Group C'],
          datasets: [
            {
              data: [40, 30, 30],
              backgroundColor: ['#42b983', '#a6c1ee', '#f87979'],
            }
          ]
        };
        lineChartData.value = {
          labels: ['2019', '2020', '2021'],
          datasets: [
            {
              data: [70, 75, 90],
              borderColor: '#42b983',
              fill: false,
            }
          ]
        };
      }
      // Additional conditions for other locations can be added here
    };

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
