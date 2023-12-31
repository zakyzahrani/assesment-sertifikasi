<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoatBooker</title>
    <link rel="icon" href="{{ asset('user/img/logo.png') }}" sizes="50">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../user/css/style.css">
</head>

<body>
    <x-navbar_user />

    <!-- CAROUSEL -->
    {{-- <div class="rent-carousel">
        <a href="">
            <div class="slider">
                <img src="../user/img/slider1.png" alt="banner">
            </div>
        </a>
        <a href="">
            <div class="slider">
                <img src="../user/img/slider2.png" alt="banner">
            </div>
        </a>
        <div class="btn-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="#fff"
                class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </div>
        <div class="btn-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="#fff"
                class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
        </div>
    </div>
    <div class="dots">
        <!-- autoFill with Js -->
    </div> --}}
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="../user/img/slider2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item active">
                <img src="../user/img/slider1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- CAROUSEL END -->

    <!-- RENT -->

        <div class="rent container-lg mt-5">
            
            
        </div>


    <!-- RENT END -->

    <x-footer_user />
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carouselExample = document.getElementById('carouselExample');
            var carousel = new bootstrap.Carousel(carouselExample, {
                interval: 5000
            });

            setInterval(function() {
                carousel.next();
            }, 5000);
        });
    </script>

    <script src="{{ asset('user/js/script.js') }} }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>