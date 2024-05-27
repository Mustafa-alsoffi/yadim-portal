@extends('layouts.app')

@section('content')
    <header class="header"></header>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
                    <div class="promo pe-md-3 pe-lg-5">
                        <h1 class="headline mb-3">Pusat Demografi Dakwah</h1>
                        <div class="subheadline mb-4">
                            Sebuah pusat atau platform khusus yang berfokus pada pengumpulan, analisis, dan pemanfaatan data
                            demografi untuk meningkatkan keberkesanan kerja dakwah Islam
                        </div>

                        <div class="d-flex justify-items-end">
                            <div class="d-felx col-12 col-md-auto align-self-end">
                                <a class="btn btn-primary w-100" href="#">Get Started</a>
                            </div>
                            <div class=" col-12 col-md-auto align-self-end">
                                <a class="btn btn-secondary w-100" href="#benefits-section">Learn More</a>
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
                                            "Excellent Book! Add your book reviews here consectetur adipiscing elit. Aliquam
                                            euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra quis
                                            erat vitae, auctor imperdiet nisi."
                                        </blockquote>
                                        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                            <div class="col-12 col-md-auto text-center text-md-start">
                                                <img width='60px' height='60px' class="source-profile"
                                                    src="/assets/images/profiles/profile-2.png" alt="image">
                                            </div>
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 1</div>
                                                <div class="source-title">Co-Founder, Startup Week</div>
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
                                                <img width='60px' height='60px' class="source-profile"
                                                    src="/assets/images/profiles/profile-2.png" alt="image">
                                            </div>
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 3</div>
                                                <div class="source-title">Co-Founder, Startup Week</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <blockquote class="quote p-4 theme-bg-light">
                                            "Awesome! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                            euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra quis
                                            erat vitae."
                                        </blockquote>
                                        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                            <div class="col-12 col-md-auto text-center text-md-start">
                                                <img width='60px' height='60px' class="source-profile"
                                                    src="/assets/images/profiles/profile-2.png" alt="image">
                                            </div>
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 3</div>
                                                <div class="source-title">Frontend Developer, Company Lorem</div>
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
        <div class="container py-5">
            <h2 class="section-heading text-center mb-3">
                Penduduk Muslim Dashboard
            </h2>
            <img class="img-fluid" src="/assets/images/dashboard.png" alt="image description">
        </div>
    </section>

    <section id="audience-section" class="audience-section py-5">
        <div class="container mb-5">
            <h2 class="section-heading text-center mb-4">Latest Blogs</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="card-title">{{ $post['title']['rendered'] }}</h3>
                                <p class="card-text content">{!! $post['content']['rendered'] !!}</p>
                                <a href="{{ $post['link'] }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
