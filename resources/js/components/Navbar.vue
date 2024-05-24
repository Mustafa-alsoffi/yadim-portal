<template>
    <nav class="navbar">
      <img src="/assets/images/logo.png" alt="YADIM Logo" class="logo">
      <ul class="nav-links">
        <li><a href="/">HOME</a></li>
        <li><a href="/aboutus">About Us</a></li>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/map">MAP</a></li>
        <li><a href="/contactus">Contact Us</a></li>
        <li><a href="/dataset">Dataset</a></li>
        <li><a href="/login">Login</a></li>
      </ul>
      <button class="menu-toggle" @click="toggleSidebar">
        <img src="/assets/images/nice-dropdown-icon.png" alt="Dropdown Icon" class="icon">
      </button>
      <div class="sidebar" :class="{ 'sidebar-open': sidebarOpen }">
        <button class="close-btn" @click="toggleSidebar">✖</button>
        <div class="sidebar-content">
          <a href="#">Muslim Population</a>
          <a href="#">Masjid</a>
          <a href="#">Wakaf</a>
          <a href="#">Pondok</a>
          <a href="#">Penerbitan</a>
          <a href="#">NGO</a>
          <a href="#">Kepimpinan Pelajar</a>
          <a href="#">Sukarelawan</a>
          <a href="#">Feedback Form</a>
          <a href="#">Settings</a>
          <a href="#">Log out</a>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "Navbar",
    data() {
      return {
        sidebarOpen: false,
      };
    },
    methods: {
      toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
      }
    }
  };
  </script>
  
  <style scoped>
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1em;
    background-color: #fff;
    position: fixed;
    width: 100%;
    z-index: 1000;
    height: 90px;
  }
  
  .navbar .logo {
    height: 60px;
  }
  
  .nav-links {
    list-style: none;
    display: flex;
    gap: 40px;
    margin: 0 auto;
  }
  
  .nav-links li {
    display: inline;
  }
  
  .nav-links a {
    text-decoration: none;
    color: #070707;
    font-size: 1.2em;
  }
  
  .nav-links a:hover {
    color: #01AEA5;
  }
  
  .menu-toggle {
    background-color: transparent;
    border: none;
    cursor: pointer;
  }
  
  .menu-toggle .icon {
    height: 30px;
    width: 30px;
  }
  
  .sidebar {
    position: fixed;
    top: 0;
    right: -300px;
    width: 300px;
    height: 100%;
    background-color: #01AEA5;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
    transition: right 0.3s ease;
    z-index: 1001;
    padding: 20px;
    box-sizing: border-box;
  }
  
  .sidebar-open {
    right: 0;
  }
  
  .close-btn {
    background: none;
    border: none;
    color: white;
    font-size: 1.5em;
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 10px;
  }
  
  .sidebar-content {
    display: flex;
    flex-direction: column;
    margin-top: 50px;
  }
  
  .sidebar-content a {
    color: white;
    text-decoration: none;
    font-size: 1.2em;
    margin-bottom: 15px;
  }
  
  .sidebar-content a:hover {
    text-decoration: underline;
  }
  </style>
  