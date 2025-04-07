@extends("layouts.finance")

@section("pagecontent")

<div class="row">
  <div class="col-md-12" align="center">
    <h2>EXPENSES</h2>

    <p class="p-3">These red columns are daily sums of expenses. They show how much<br> you spent on a given day in the month,
       telling you when you spent<br> the most and helping you to find the main culprit of overspending. 
      <br>The taller and darker the column, the more was spent.</p>

      <div class="col-md-12 p-3"><img src="images/exp.webp" alt="it5" class="img-fluid"></div><br></br>
      <h4>Compare the “left to spend” and “today” lollipops</h4>

      <p>To quickly size up your financial health this month, look at the two lollipops 
        on the graph.<br> The green lollipop tells you how much money you have left to spend, while
         the grey – <br>today lollipop tells you how much time you have left.<br></br>
        If they’re aligned or almost aligned, you’re right on track so far. You’re on 
        the<br> way to spend the almost exact amount of money you budgeted or earned in this period.</p>

        <div class="col-md-12 p-3"><img src="images/exp1.png" alt="it5" class="img-fluid"></div><br></br>

        <p><b>If the today lollipop (grey) is way ahead of the money left lollipop (green),</b> then you’re doing<br> 
          great this month. You’ve spent less
           than you thought you will in this amount of time.<br> If this happens a lot, perhaps it’s time to lower the budget amount.</p>
           <div class="col-md-12 p-3"><img src="images/exp2.webp" alt="it5" class="img-fluid"></div><br></br>

           <p><b>If the money left lollipop (green) is way ahead of the today lollipop (grey),</b> 
            then you’re<br> <b>not doing so well</b> with your budget. You’re spending more than was expected.
             Time to <br>reduce your spending, or if that’s not possible, make the budget amount larger next time.</p>

             <div class="col-md-12 p-3"><img src="images/exp3.webp" alt="it5" class="img-fluid"></div><br></br>

             <p><b>If the lollipop has already turned to red,</b>you have already <b>spent more than the money you had <br>put 
              in</b> the budget amount. The lollipop simply tells you by how much.</p>

              <div class="col-md-12 p-3"><img src="images/exp3.webp" alt="it5" class="img-fluid"></div><br></br>
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
@endsection