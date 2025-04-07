<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-6 hidden md:block">
            <h2 class="text-xl font-bold mb-6">Welcome, {{ Auth::user()->firstname }}</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('income.index') }}" class="block py-3 px-5 rounded-lg hover:bg-blue-700 transition">Income</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('expense.index') }}" class="block py-3 px-5 rounded-lg hover:bg-blue-700 transition">Expense</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('savings_goal.index') }}" class="block py-3 px-5 rounded-lg hover:bg-blue-700 transition">Savings Goal</a>
                    </li>
                    <li class="mt-6">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full py-3 px-5 bg-red-600 hover:bg-red-700 rounded-lg transition">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Mobile Navbar -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-blue-900 text-white p-4 flex justify-around">
            <a href="{{ route('income.index') }}" class="px-4 py-2 hover:bg-blue-700 rounded-lg">Income</a>
            <a href="{{ route('expense.index') }}" class="px-4 py-2 hover:bg-blue-700 rounded-lg">Expense</a>
            <a href="{{ route('savings_goal.index') }}" class="px-4 py-2 hover:bg-blue-700 rounded-lg">Savings</a>
        </div>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
