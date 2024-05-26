@extends('layouts.app')

@section('content')
@vite(['resources/css/map.css']) <!-- Link the CSS file using Vite -->
@vite(['resources/css/index.css']) <!-- Link the CSS file using Vite -->

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<header class="header">
    <!-- <nav class="navbar navbar-expand-lg navbar-light">
        <div class="branding" style="padding-left: 100px; padding-right: 100px;">
            <div class="container-fluid position-relative py-4">
                <div class="logo-wrapper">
                    <div class="site-logo">
                        <a class="navbar-brand" href="/">
                            <img style="width:150px" class="logo-icon ms-2" src="/assets/images/site-logo.png" alt="logo">
                            <span class="logo-text"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#benefits-section">Laman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#content-section">Tentang kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#audience-section">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#form-section">Hantar Data</a>
                    </li>
                </ul>
            </div>
            <div class="header-right d-flex align-items-center">
                <a class="btn btn-outline-primary me-3" href="/login">Login</a>
                <a class="btn btn-primary" href="/signup">Sign Up</a>
            </div>
    </nav> -->
</header>
<div class="header-container"> <!-- New container for the header -->
    <h1>WELCOME TO YADIM</h1>
</div>

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
                <div class="promo pe-md-3 pe-lg-5">
                    <h1 class="headline mb-3">
                        Pusat Demografi Dakwah
                    </h1>
                    <div class="subheadline mb-4">
                        Sebuah pusat atau platform khusus yang berfokus pada pengumpulan, analisis, dan pemanfaatan
                        data demografi untuk meningkatkan keberkesanan kerja dakwah Islam
                    </div>

                    <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-primary w-100" href="#">Get
                                Started</a>
                        </div>
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Learn More</a>
                        </div>
                    </div>

                    <div class="hero-quotes mt-5">
                        <div id="quotes-carousel" class="quotes-carousel carousel slide carousel-fade mb-5"
                            data-bs-ride="carousel" data-bs-interval="8000">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Excellent Book! Add your book reviews here consectetur adipiscing elit.
                                        Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque,
                                        viverra quis erat vitae, auctor imperdiet nisi."
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="/assets/images/profiles/profile-1.png"
                                                alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">NGO 1</div>
                                            <div class="soure-title">Co-Founder, Startup Week</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Highly recommended consectetur adipiscing elit. Proin et auctor dolor, sed
                                        venenatis massa. Vestibulum ullamcorper lobortis nisi non placerat praesent
                                        mauris neque"
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="/assets/images/profiles/profile-2.png"
                                                alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">NGO 3</div>
                                            <div class="soure-title">Co-Founder, Startup Week</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <blockquote class="quote p-4 theme-bg-light">
                                        "Awesome! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                        euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra
                                        quis erat vitae."
                                    </blockquote>
                                    <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                        <div class="col-12 col-md-auto text-center text-md-start">
                                            <img class="source-profile" src="/assets/images/profiles/profile-3.png"
                                                alt="image">
                                        </div>
                                        <div class="col source-info text-center text-md-start">
                                            <div class="source-name">NGO 3</div>
                                            <div class="soure-title">Frontend Developer, Company Lorem</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-5 align-self-center">
                <div class="book-cover-holder">
                    <img class="img-fluid book-cover" src="/assets/images/designer_1.png" alt="book cover">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
@include('components.map-section')
</section>
<div class="container mt-5">
    <h1 class="mb-5 text-center">Latest News</h1>
    <div class="row">
        @foreach ($entries as $entry)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @php
                        $content = $entry->get('content');
                        preg_match('/!\[.*?\]\((.*?)\)/', $content, $matches);
                        $image = $matches[1] ?? 'https://via.placeholder.com/150';
                    @endphp
                    <img src="{{ $image }}" class="card-img-top img-fluid fixed-img-size" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $entry->get('title') }}</h5>
                        <p class="card-text">{{ Str::limit($content, 100) }}</p>
                        <a href="{{ route('page.show', $entry->slug()) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
