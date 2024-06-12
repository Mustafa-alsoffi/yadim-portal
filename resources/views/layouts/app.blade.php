<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og:title')">
    <meta property="og:description" content="@yield('og:description')">
    <meta property="og:url" content="@yield('og:url')">
    <meta property="og:image" content="@yield('og:image')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Other meta tags -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('path/to/your/css/index.css') }}">

    <!-- FontAwesome -->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div id="app">
        <Navbar></Navbar>
        <div style="height: 50px"></div>
        <div class="content-wrapper"> <!-- Add this wrapper div -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <footer class="footer">
            <div class="footer-bottom text-center py-5">
                <section id="author-section" class="author-section section theme-bg-primary py-5 custom-blue-footer">
                    <div class="container py-3">
                        <div class="author-bio single-col-max mx-auto">
                            <p>This landing page is good <a class="theme-link" href="http://themes.3rdwavemedia.com"
                                    target="_blank">Xiaoying Riley</a> Lorem ipsum dolor sit amet consectetur,
                                adipisicing
                                elit. Necessitatibus illo expedita dolore delectus deleniti debitis! Reiciendis maxime
                                omnis
                                veritatis provident ut. Quasi nesciunt, inventore consectetur voluptatum culpa harum!
                                Earum, ex. as <a class="theme-link" href="https://gumroad.com/"
                                    target="_blank">Gumroad</a> to handle
                                your book payment and delivery.</p>
                            <p> as long as you <strong>keep the footer attribution link</strong>. You do
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, minus, facere possimus
                                nulla
                                inventore dolorem incidunt esse laborum quod accusamus quis voluptate quae delectus
                                fuga.
                                Totam quod
                                animi praesentium doloremque.ooter <a class="theme-link" href="#"
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
