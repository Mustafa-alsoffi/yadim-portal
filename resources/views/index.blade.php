<!DOCTYPE html>
<html lang="en">

<head>
    <title>DevBook - Bootstrap 5 Book/eBook Landing Page Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&display=swap"
        rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="branding" style="padding-left: 100px; padding-right: 100px;">
                <div class="container-fluid position-relative py-4">
                    <div class="logo-wrapper">
                        <div class="site-logo"><a class="navbar-brand" href="index.html"><img style="width:150px"
                                    class="logo-icon ms-2" src="assets/images/site-logo.png" alt="logo"><span
                                    class="logo-text"></span></a></div>
                    </div><!--//docs-logo-wrapper-->

                    {{-- add login and signup buttons here --}}
                </div><!--//container-->
            </div><!--//branding-->
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
        </nav>
    </header><!--//header-->

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
                    <div class="promo pe-md-3 pe-lg-5">
                        <h1 class="headline mb-3">
                            Pusat Demografi Dakwah
                        </h1><!--//headline-->
                        <div class="subheadline mb-4">
                            Sebuah pusat atau platform khusus yang berfokus pada pengumpulan, analisis, dan pemanfaatan
                            data demografi untuk meningkatkan keberkesanan kerja dakwah Islam

                        </div><!--//subheading-->

                        <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
                            <div class="col-12 col-md-auto">
                                <a class="btn btn-primary w-100"
                                    href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/">Get
                                    Started</a>
                            </div>
                            <div class="col-12 col-md-auto">
                                <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Learn More</a>
                            </div>
                        </div><!--//cta-holder-->

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
                                        </blockquote><!--//item-->
                                        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                            <div class="col-12 col-md-auto text-center text-md-start">
                                                <img class="source-profile" src="assets/images/profiles/profile-1.png"
                                                    alt="image">
                                            </div><!--//col-->
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 1</div>
                                                <div class="soure-title">Co-Founder, Startup Week</div>
                                            </div><!--//col-->
                                        </div><!--//source-->
                                    </div><!--//carousel-item-->
                                    <div class="carousel-item">
                                        <blockquote class="quote p-4 theme-bg-light">
                                            "Highly recommended consectetur adipiscing elit. Proin et auctor dolor, sed
                                            venenatis massa. Vestibulum ullamcorper lobortis nisi non placerat praesent
                                            mauris neque"
                                        </blockquote><!--//item-->
                                        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                            <div class="col-12 col-md-auto text-center text-md-start">
                                                <img class="source-profile" src="assets/images/profiles/profile-2.png"
                                                    alt="image">
                                            </div><!--//col-->
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 3</div>
                                                <div class="soure-title">Co-Founder, Startup Week</div>
                                            </div><!--//col-->
                                        </div><!--//source-->
                                    </div><!--//carousel-item-->
                                    <div class="carousel-item">
                                        <blockquote class="quote p-4 theme-bg-light">
                                            "Awesome! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                            euismod nunc porta urna facilisis tempor. Praesent mauris neque, viverra
                                            quis erat vitae."
                                        </blockquote><!--//item-->
                                        <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                                            <div class="col-12 col-md-auto text-center text-md-start">
                                                <img class="source-profile" src="assets/images/profiles/profile-3.png"
                                                    alt="image">
                                            </div><!--//col-->
                                            <div class="col source-info text-center text-md-start">
                                                <div class="source-name">NGO 3</div>
                                                <div class="soure-title">Frontend Developer, Company Lorem</div>
                                            </div><!--//col-->
                                        </div><!--//source-->
                                    </div><!--//carousel-item-->
                                </div><!--//carousel-inner-->
                            </div><!--//quotes-carousel-->

                        </div><!--//hero-quotes-->
                    </div><!--//promo-->
                </div><!--col-->
                <div class="col-12 col-md-5 mb-5 align-self-center">
                    <div class="book-cover-holder">
                        <img class="img-fluid book-cover" src="assets/images/designer_1.png" alt="book cover">
                    </div><!--//book-cover-holder-->
                </div><!--col-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//hero-section-->

    <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
        <div class="container py-5">
            <h2 class="section-heading text-center mb-3">
                Penduduk Muslim Dashboard
            </h2>
            <img class="img-fluid" src="assets/images/dashboard.png" alt="image description">
    </section><!--//benefits-section-->


    <section id="audience-section" class="audience-section py-5">
        <div class="container mb-5">
            <h2 class="section-heading text-center mb-4">Latest Blogs</h2>
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="blog-card">
                        <img src="path/to/blog-image-1.jpg" alt="Blog Image">
                        <div class="blog-content">
                            <h3 class="blog-title">Blog Title 1</h3>
                            <p class="blog-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                                sodales sit amet neque sit amet molestie.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-card">
                        <img src="path/to/blog-image-2.jpg" alt="Blog Image">
                        <div class="blog-content">
                            <h3 class="blog-title">Blog Title 2</h3>
                            <p class="blog-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                                sodales sit amet neque sit amet molestie.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-card">
                        <img src="path/to/blog-image-3.jpg" alt="Blog Image">
                        <div class="blog-content">
                            <h3 class="blog-title">Blog Title 3</h3>
                            <p class="blog-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                                sodales sit amet neque sit amet molestie.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--//item-->
    </section><!--//audience-section-->



    <section id="author-section" class="author-section section theme-bg-primary py-5">
        <div class="container py-3">
            <div class="author-bio single-col-max mx-auto">
                <p>This landing page is good <a class="theme-link" href="http://themes.3rdwavemedia.com"
                        target="_blank">Xiaoying Riley</a> Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Necessitatibus illo expedita dolore delectus deleniti debitis! Reiciendis maxime omnis veritatis
                    provident ut. Quasi nesciunt, inventore consectetur voluptatum culpa harum! Earum, ex. as <a
                        class="theme-link" href="https://gumroad.com/" target="_blank">Gumroad</a> to handle your
                    book payment and delivery.</p>
                <p> as long as you <strong>keep the footer attribution link</strong>. You do
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, minus, facere possimus nulla
                    inventore dolorem incidunt esse laborum quod accusamus quis voluptate quae delectus fuga. Totam quod
                    animi praesentium doloremque.ooter <a class="theme-link"
                        href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/"
                        target="_blank"><strong>commercial license</strong></a>.</p>
                <div class="author-links text-center pt-4">
                    <h5 class="text-white mb-4">Follow Us</h5>
                    <ul class="social-list list-unstyled">
                        <li class="list-inline-item"><a href="https://twitter.com/3rdwave_themes"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://github.com/xriley"><i
                                    class="fab fa-github-alt"></i></a></li>
                        <li class="list-inline-item"><a href="https://medium.com/@3rdwave_themes"><i
                                    class="fab fa-medium-m"></i></a></li>

                        <li class="list-inline-item"><a href="https://themes.3rdwavemedia.com/"><i
                                    class="fas fa-globe-europe"></i></a></li>
                    </ul><!--//social-list-->
                </div><!--//author-links-->

            </div><!--//author-bio-->

        </div><!--//container-->
    </section><!--//author-section-->



    <footer class="footer">

        <div class="footer-bottom text-center py-5">

        </div>

    </footer>

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/smoothscroll.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>
