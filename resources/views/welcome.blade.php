@extends("layouts.finance")

@section("pagecontent")
<div class="container">
    <!-- Carousel -->
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/caro.jpeg') }}" class="d-block w-100" alt="pic">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/caro2.webp') }}" class="d-block w-100" alt="banner1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/caro3.webp') }}" class="d-block w-100" alt="banner2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Text Section -->
    <div class="row">
        <div class="col-md-6 p-4">
            <h1>The only app that <br> gets your <span style="color:green">Money</span> <br> into shape</h1>
            <p>Once in a while, one needs to take a broader look at things, even personal finances. 
                To help you track the flow of finances from a higher ground.</p> 
            <a href="{{ route('about') }}">
                <button class="btn btn-outline-primary">Read More</button>
            </a>
        </div>

        <div class="col-md-6 p-4 text-center">
            <h1><b>Track all <br>your cards and cash<br><i>in one place.</i></b></h1>
            <p>Connect your financial accounts, or enter expenses using our quick and slick 
                Agape app. Agape helps you with the financial means, so you can focus on the goals.</p>
            
            @guest
            <a href="{{ route('register') }}">
                <button class="btn btn-outline-primary">Sign up</button>
            </a>
            @endguest
        </div>
    </div>

    <!-- Footer Quick Links Section -->
    <div class="row">
        <!-- Quick Links -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Quick Links</h6>
            <ul class="list-unstyled">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('income-tracking') }}">Income Tracking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('expense-tracking') }}">Expense Tracking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('security') }}">Security</a>
                </li>
            </ul>
        </div>

        <!-- Corporate Head Office -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Corporate Head Office</h6>
            <p class="text-white">Plot 82 Coker Street, Ikeja, Lagos State, Nigeria.</p>
        </div>

        <!-- About Us -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">About Us</h6>
            <p class="text-white">
                Once in a while, one needs to take a broader look at things, even personal finances.
                This platform helps you track the flow of finances from a higher ground.
            </p>
        </div>
    </div>
</div>
@endsection
