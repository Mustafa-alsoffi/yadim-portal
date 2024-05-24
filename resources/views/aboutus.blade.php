@extends('layouts.app')

@section('content')
@vite(['resources/css/aboutus.css']) <!-- Link the CSS file using Vite -->

<div class="about-us-header-container"> <!-- New container for the header -->
    <h1>ABOUT US</h1>
</div>

<div class="about-us-container mt-5"> <!-- Updated class name -->
    <div class="about-us">
        <h1>About Us</h1>
        <p>Yayasan Dakwah Islamiah Malaysia (YADIM) is a foundation dedicated to the propagation of Islamic teachings in Malaysia. Established in 1974, YADIM has been at the forefront of various initiatives to promote understanding, education, and the practice of Islam in the country.</p>
        <p>With its headquarters in Putrajaya, YADIM works closely with various governmental and non-governmental organizations to ensure that its programs reach a broad audience. YADIM's efforts include educational programs, community outreach, and interfaith dialogues aimed at fostering a harmonious and understanding society.</p>
        <a href="#" class="learn-more">Learn More</a>
    </div>
    <div class="profile">
        <div class="profile-image">
            <img src="/assets/images/logo.png" alt="YADIM Logo">
        </div>
        <div class="profile-details">
            <h2>YADIM</h2>
            <p>Address: Aras 3 & 4, Blok D, Kompleks Islam Putrajaya, No.3, Jalan Tun Razak, Presint 3, 62100 Putrajaya</p>
            <p>Phone: +603-88703870</p>
            <p>Email: pr@yadim.com.my</p>
            <a href="#" class="more-about">More About YADIM</a>
        </div>
    </div>
</div>
@endsection
