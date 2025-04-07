
<div class="d-flex flex-column flex-shrink-0 p-1 bg-light min-vh-100">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4 fw-bold">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-dark' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
       <li>
           <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : 'text-dark' }}">
        <i class="fas fa-users-cog me-2"></i> Manage Users
          </a>
        </li>
        <li>
            <a href="{{ route('admin.income') }}" class="nav-link {{ request()->routeIs('admin.income') ? 'active' : 'text-dark' }}">
                <i class="fas fa-hand-holding-usd me-2"></i> Income Records
            </a>
        </li>
        <li>
            <a href="{{ route('admin.expense') }}" class="nav-link {{ request()->routeIs('admin.expense') ? 'active' : 'text-dark' }}">
                <i class="fas fa-money-bill-wave me-2"></i> Expense Records
            </a>
        </li>
        <li>
            <a href="{{ route('admin.savings') }}" class="nav-link {{ request()->routeIs('admin.savings') ? 'active' : 'text-dark' }}">
                <i class="fas fa-piggy-bank me-2"></i> Savings Goals
            </a>
        </li>
        <li>
            <a href="{{ route('admin.income_categories.index') }}" class="nav-link {{ request()->routeIs('admin.income_categories.index') ? 'active' : 'text-dark' }}">
                <i class="fas fa-list me-2"></i> Income Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.expense_categories.index') }}" class="nav-link {{ request()->routeIs('admin.expense.category') ? 'active' : 'text-dark' }}">
                <i class="fas fa-list-alt me-2"></i> Expense Categories
            </a>
        </li>
    </ul>
    <hr>
    <div class="text-center">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
