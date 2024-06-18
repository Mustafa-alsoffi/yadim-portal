<template>
  <footer class="footer bg-primary text-white py-4 mt-auto">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <h5>Address</h5>
                  <p>Yayasan Dakwah Islamiah Malaysia (YADIM)</p>
                  <p>Aras 3 & 4, Blok D, Kompleks Islam Putrajaya, No.3, Jalan Tun Razak, Presint 3, 62100 Putrajaya</p>
              </div>
              <div class="col-md-4">
                  <h5><i class="fas fa-phone"></i> Phone</h5>
                  <p>Mobile: +603-88703870</p>
              </div>
              <div class="col-md-4">
                  <h5><i class="fas fa-clock"></i> Working Time</h5>
                  <p>Monday-Friday: 9:00 - 17:00</p>
                  <div class="social-icons">
                      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                      <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
};
</script>

<style scoped>
.footer {
  background-color: #01AEA5 !important;
  color: white;
  padding: 20px 0;
}

.social-icons {
  margin-top: 10px;
}

.social-icons a {
  color: white;
  margin-right: 10px;
  font-size: 1.5em;
  transition: color 0.3s;
}

.social-icons a:hover {
  color: #d1ecf1;
}
</style>
