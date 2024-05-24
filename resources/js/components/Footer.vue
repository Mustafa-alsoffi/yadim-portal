<template>
    <footer class="footer">
      <div>
        <img src="/assets/images/logo.png" alt="Footer Image">
        <div>
          <h4>Hubungi Kami</h4>
          <p>+603-88703870</p>
          <p>pr@yadim.com.my</p>
          <p>Yayasan Dakwah Islamiah Malaysia (YADIM) Aras 4 Blok D, Kompleks Islam Putrajaya, No 3, Jalan Tun Razak, Presint 3, 62100 Putrajaya</p>
        </div>
        <div>
          <h4>Map:</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31871.247401278277!2d101.6920858!3d3.1487319!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49a0f0b0f7fb%3A0xe03d18b0debe0d90!2sYayasan%20Dakwah%20Islamiah%20Malaysia%20(YADIM)!5e0!3m2!1sen!2smy!4v1620229347436!5m2!1sen!2smy" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div>
          <h4>Follow Us</h4>
          <a href="#"><img src="/images/facebook-icon.png" alt="Facebook"></a>
          <a href="#"><img src="/images/twitter-icon.png" alt="Twitter"></a>
          <a href="#"><img src="/images/instagram-icon.png" alt="Instagram"></a>
          <a href="#"><img src="/images/tiktok-icon.png" alt="TikTok"></a>
        </div>
      </div>
    </footer>
  </template>
  
  <script>
  export default {
    name: "Footer",
  };
  </script>
  
  <style scoped>
  /* Add your CSS styles here */
  .footer {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: #008080;
    color: white;
  }
  .footer img {
    height: 50px;
  }
  .footer div {
    flex: 1;
    padding: 10px;
  }
  </style>
  