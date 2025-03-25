<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title', 'Tasker')</title>
</head>

<body class="bg-gray-100 text-gray-900">
    {{-- Navigation Bar --}}
    <nav class="bg-white shadow-md">
        <div class="container mx-auto max-w-2xl px-4 py-3 flex justify-between items-center">
            {{-- Logo/Brand --}}
            <div class="text-xl font-bold text-primary-600">
                <a href="{{ route('task.index') }}"
                    class="text-gray-700 hover:text-primary-600 transition duration-300
                    {{ request()->routeIs('task.index') ? 'text-primary-600 font-semibold' : '' }}">
                    Tasker
                </a>
            </div>

            {{-- Navigation Links --}}
            <div class="space-x-4">
                <a href="{{ route('task.complete.list') }}"
                    class="text-gray-700 hover:text-primary-600 transition duration-300
                    {{ request()->routeIs('task.complete.list') ? 'text-primary-600 font-semibold' : '' }}">
                    Completed Task List
                </a>
                <a href="{{ route('task.create') }}"
                    class="text-gray-700 hover:text-primary-600 transition duration-300
                    {{ request()->routeIs('task.create') ? 'text-primary-600 font-semibold' : '' }}">
                    Create New Task
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-2xl px-4 py-8">
        {{-- Page Header --}}
        {{-- <header class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 border-b pb-3">@yield('title')</h1>
        </header> --}}

        {{-- Flash Messages --}}
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex justify-between items-center"
                role="alert">
                <span>{{ session('success') }}</span>
                <button class="text-green-700 hover:text-green-900 font-bold"
                    onclick="this.parentElement.style.display='none'">
                    ✕
                </button>
            </div>
        @endif

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
