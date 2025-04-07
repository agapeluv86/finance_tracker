@extends("layouts.finance")

@section("pagecontent")

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 p-3 text-center">
            <h2>How Your Money Flows Each Month</h2>
            <br>
            <p>
                Once in a while, one needs to take a broader look at things, even personal finances.<br>
                To help you see your monthly flow of finances from a higher ground, we made the “river flow” graph.
            </p>
            <div class="col-md-12 p-3">
                <img src="{{ asset('images/income.webp') }}" alt="Income Flow" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                Imagine the money that you earn and spend each month as a system of rivers.<br>
                It flows in, hopefully rests a bit in a lake of your making, then most of it flows out again
                to replenish the fields – or yourself and your phone bill.<br>
                With good planning, you can build yourself a dam and some accumulation lakes on the side, just to
                be safe if a dry season ever hits you.
            </p>
            <div class="col-md-12 p-3">
                <img src="{{ asset('images/income1.webp') }}" alt="Income Graph" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                The number at the very top is your income, your main inbound stream. If you set up your monthly budget for all expenses, that will be the dam you constructed.<br>
                Income flows in and hits the dam. If the income amount is larger than the budget amount, the difference will flow into your savings for the dry months.
            </p>

            <p>
                It’s good to grow an “accumulation lake” or, as your banker would call it, a savings account.<br>
                If the budget is larger than the income, you’re living beyond your means and need to adjust the budget—or even better, increase your income if possible.
            </p>

            <p><b>The width of the flow represents its size.</b></p>
            <p>The flow in <b style="color:red;">dark red</b> are <span style="color:red">expenses</span> that have already been made.</p>
            <p>The <b>pink flow</b> are your <span style="background-color: pink;">planned expenses</span> for this month.</p>
            <p>The <b>green flow</b> is your <span style="color: green;">“left to spend”</span> money—budgeted but not yet spent.</p>

            <div class="col-md-12 p-3">
                <img src="{{ asset('images/income2.webp') }}" alt="Income Planning" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                If your expense flow is much stronger than the income one, your savings will run dry quickly.<br>
                Hopefully, you've accumulated enough in the past to weather through any financial droughts.
            </p>

            <div class="col-md-12 p-3">
                <img src="{{ asset('images/income3.webp') }}" alt="Income vs Expense" class="img-fluid">
            </div>

            <p>
                The river flow graph helps you understand your money flow and avoid financial crises before they happen.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Quick Links -->
        <div class="col-md-4 bg-primary p-4 shadow">
            <h6 class="text-white">Quick Links</h6>
            <ul class="list-unstyled">
                <li><a class="nav-link text-white" href="{{ route('about') }}">About Us</a></li>
                <li><a class="nav-link text-white" href="{{ route('income-tracking') }}">Income Tracking</a></li>
                <li><a class="nav-link text-white" href="{{ route('expense-tracking') }}">Expense Tracking</a></li>
                <li><a class="nav-link text-white" href="{{ route('security') }}">Security</a></li>
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
</div>
@endsection
