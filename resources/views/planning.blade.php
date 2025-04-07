@extends("layouts.finance")

@section("pagecontent")

<div class="row">
    <div class="col-md-12 text-center"> 
        <h2>Personal Finances</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6 p-4">
        <h3 class="text-center">The Monthly Overview – Your Personal Finances<br> at a Glance</h3><br>
        <p>Getting a complete sense of your personal finances is important, even when you just open the app for a quick peek. 
        That’s why we made the Monthly Overview graph.
        We included the information you need right away and made it easy to go deeper when you need more details.
        <br>It’s true that this graph contains a few more elements than usual, so there is a bit of a learning curve.
        But give it a chance, it will make the quick looks at your finances a lot more effective.</p>
    </div>

    <div class="col-md-6 py-3">
        <img src="{{ asset('images/f1.webp') }}" alt="it1" class="img-fluid">
    </div>
</div>

<div class="row">
    <div class="col-md-6 p-4">
        <p><b style="color:green">“Left to spend”</b> As the name implies, this big green number tells you how much money is remaining for you to spend this month.
        If you have set up a monthly budget, all the expenses in this month will be deducted from the budget amount and what you get is Left to spend.
        <br><b style="color:green">“Progress bar”</b> The green-coloured background of the graph is a progress bar that tells you how much money you have “left to spend”. 
        The length of the graph represents all the money you have “left to spend” in the month. 
        <br>In the beginning of the month, the whole graph is green. But as you add more expenses, it starts shrinking from left towards the right side. 
        The green lollipop shows you where it ends and tells you how much you have left to spend.</p>
    </div>
    <div class="col-md-6 py-4">
        <img src="{{ asset('images/f2.png') }}" alt="it2" class="img-fluid">
        Left to spend and progress bar
    </div>
</div>

<div class="row">
    <div class="col-md-6 py-3">
        <img src="{{ asset('images/f3.webp') }}" alt="it3" class="img-fluid">
    </div>
    <div class="col-md-6 p-2">
        <h5><b style="color:green">Overspent</b></h5><br>
        <p>If you surpass the budget amount you have set for yourself, or spend more than you earn, the progress bar will start appearing from the left in red colour, with
        the red lollipop up front. In that case, it will display how much you went over your budget, or overspent your earnings.
        <br>You can also see an upside-down lollipop in dark grey with <b style="color:darkgray">“today”</b> written on it. This lollipop shows the current day compared to the time of the entire month.
        The entire length of the graph represents all the time in the month and the “today” lollipop displays where you are now.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 p-4">
        <h4>Expenses – spending per month</h4><br>
        <p>Shows the sum of expenses each month, but can also be filtered to display spending on certain categories, tags, locations, and financial accounts.</p>
        <p>You can zero-in on specific data you’re interested in and want to see over a longer period of time.
        Let’s say you want to know how your spending on Food & Drinks varies over time. Click on “Expense categories” in the right sidebar, 
        “Select categories” and click “Food & Drinks”. The graph will immediately filter to show you only spending data for the Food & Drinks category, 
        so you can see how it varies throughout the year. You can narrow it down further by selecting a tag and see how much you spent only on restaurants, alcohol, groceries, or a combination of multiple tags.</p>
    </div>
    <div class="col-md-6">
        <img src="{{ asset('images/exp5.webp') }}" alt="it6" class="img-fluid">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('images/exp7.webp') }}" alt="it5" class="img-fluid">
    </div>
    <div class="col-md-6 p-4">
        <h4>Incomes – earnings per month</h4><br>
        <p>Shows the sum of incomes each month, but can also be filtered to display earnings on certain categories, tags, and financial accounts.</p><br>
        <h4>Net worth – total balance of your financial accounts</h4>
        <p>These funds accumulate if you have regular surpluses on your monthly balances. The amounts reflect the account balances at the end of the month.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 p-4">
        <h4>Estimates and planned expenses</h4><br>
        <p><b>Planned entries</b>
        These are the expenses, incomes, and transfers you have already entered into the future, or were generated automatically based on the repeating entry settings that you have set earlier.
        <br>We advise adding as many of these as you can possibly predict. They’ll help you plan your future months so you can keep financial stress down to the minimum.</p>
        <p><b>Estimates</b>
        Estimates project your past trends in earning and spending into the future, providing a rough guide of what to expect with your balances, spending, earnings, or net worth if the current trends continue.
        The more time you’ve been tracking your finances, the more precise they can become. We’ll also be improving the algorithm for this over time, so it will become better at guessing your spending patterns.</p><br>
    </div>
    <div class="col-md-6">
        <img src="{{ asset('images/exp8.webp') }}" alt="it5" class="img-fluid">
    </div>
</div>

<div class="row">
    <!-- Left Column: Navigation Links -->
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
        <p class="text-white">Once in a while, one needs to take a broader look at things, even personal finances. This platform helps you track the flow of finances from a higher ground.</p>
    </div>
</div>

@endsection




















