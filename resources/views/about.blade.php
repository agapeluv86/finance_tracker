@extends("layouts.finance")

@section("pagecontent")
    <div class="row">
        <div class="col-md-6 p-5">
            <h1>ABOUT US</h1>
            <br>
            <h3>We enable people to make smart decisions about their money everyday.</h3>
            <br>
            <p>We believe that tracking your finance should be as effortless as shopping online.<br> It should be done anytime,
                anywhere and in few clicks.
            </p>
            <p>What started as a simple expense tracker for a small group of people has grown into a personal
                finance app that brings beauty to the finances of hundreds of thousands of users from almost every country in the world.</p>
            <br>
            <p>We help you get your finances into shape so that you don't need to stress about every dollar you spend. If you know
                how much and what you spend, it is easier to change your financial habits, if you feel like that's what you need.</p>
            <br>
            <p>Having a complete picture of your finances in one place makes them easier to manage. Our mission here is to help you leave your financial ghosts behind,
                overcome your financial fears, and treat yourself with financial wisdom instead.</p>
        </div>
        <div class="col-md-6 p-5">
            <img src="{{ asset('images/expenses-ipad.png') }}" alt="expenses image" class="img-fluid">
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Navigation Links -->
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

        <!-- Middle Column: Corporate Office Information -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Corporate Head Office</h6>
            <p class="text-white">Plot 82 Coker Street, Ikeja, Lagos State, Nigeria.</p>
        </div>

        <!-- Right Column: About Us -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">About Us</h6>
            <p class="text-white">
                Once in a while, one needs to take a broader look at things, even personal finances.
                This platform helps you track the flow of finances from a higher ground.
            </p>
        </div>
    </div>
@endsection

