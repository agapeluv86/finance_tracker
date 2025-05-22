@extends("layouts.finance")

@section("pagecontent")
<div class="container mt-5">
    <div class="row">
       
        <div class="col-md-6">
            <img src="{{ asset('images/cust.jpg') }}" alt="Customer Support" class="img-fluid">
        </div>

       
        <div class="col-md-6 p-5">
            <div class="row">
                
                <div class="col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="contact-add-item text-center">
                        <div class="contact-icon text-primary mb-3">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </div>
                        <h5>Address</h5>
                        <p>Plot 82 Coker Street, Ikeja, Lagos State</p>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="contact-add-item text-center">
                        <div class="contact-icon text-primary mb-3">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <h5>Email</h5>
                        <p>
                            <a href="mailto:agapeluv1119@gmail.com?subject=Hello&body=I%20wanted%20to%20reach%20out..." class="text-dark">
                                agapeluv1119@gmail.com
                            </a>
                        </p>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="contact-add-item text-center">
                        <div class="contact-icon text-primary mb-3">
                            <i class="fa fa-phone-alt fa-2x"></i>
                        </div>
                        <h5>Phone</h5>
                        <p>0806-049-5428</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row mt-5">
       
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Quick Links</h6>
            <ul class="list-unstyled">
                <li><a class="nav-link text-white" href="{{ route('about') }}">About Us</a></li>
                <li><a class="nav-link text-white" href="{{ route('income-tracking') }}">Income Tracking</a></li>
                <li><a class="nav-link text-white" href="{{ route('expense-tracking') }}">Expense Tracking</a></li>
                <li><a class="nav-link text-white" href="{{ route('security') }}">Security</a></li>
            </ul>
        </div>

        
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Corporate Head Office</h6>
            <p class="text-white">Plot 82 Coker Street, Ikeja, Lagos State, Nigeria.</p>
        </div>

        
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
