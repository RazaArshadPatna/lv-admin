<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Header + Slider1</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Optional: make header stand out */
        .navbar {
            z-index: 999;
        }
        @media (min-width: 992px) {
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 60px;
    }
}
    </style>
</head>
<body>

<!-- ✅ Sticky Header -->
<nav class="navbar navbar-expand-lg navbar-light  bg-light sticky-top">
    <div class="container">

    @foreach($webinfo as $user)
    <img src="{{ asset('storage/'.$user->image) }}" style="max-width:150px;">
@endforeach

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ✅ Slider / Carousel -->
<div id="mainSlider" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">

    @foreach($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$slider->image) }}" class="d-block w-100" alt="Slide">

            <div class="carousel-caption">
                <h3>{{ $slider->title }}</h3>
                <p>{{ $slider->description }}</p>
            </div>
        </div>
    @endforeach

</div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Dummy Content -->
<div class="container mt-5">
    <h2>Welcome to Laravel</h2>
    <p>This is your page content below the slider.</p>
</div>

<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>