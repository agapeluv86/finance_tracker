<div class="col-md-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 shadow" 
         style="width: 280px; min-height: 550px; background: #ffffff; border-radius: 10px; border: 1px solid #ddd;
                margin-left: -100px;">
        
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-dark fw-bold {{ request()->is('dashboard') ? 'active' : '' }}" 
                   style="border-radius: 8px; background: #f8f9fa;">
                    <i class="fa fa-dashboard me-2"></i> Finance Manager
                </a>
            </li>
            
            <li>
                <a href="{{ route('expense.index') }}" class="nav-link text-dark fw-bold {{ request()->is('expense.index') ? 'active' : '' }}" style="border-radius: 8px;">
                    <i class="fas fa-piggy-bank me-2" style="color: orange;"></i> Expenses
                </a>
            </li>
            <li>
                <a href="{{ route('income.index') }}" class="nav-link text-dark fw-bold {{ request()->is('income.index') ? 'active' : '' }}" style="border-radius: 8px;">
                    <i class="fas fa-money-bill-wave me-2" style="color: green;"></i> Income
                </a>
            </li>
            <li>
                <a href="{{ route('savings.index') }}" class="nav-link text-dark fw-bold {{ request()->is('savings.index') ? 'active' : '' }}" style="border-radius: 8px;">
                    <i class="fas fa-coins me-2" style="color: blue;"></i> Savings
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="nav-link text-danger fw-bold" style="border-radius: 8px;"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
