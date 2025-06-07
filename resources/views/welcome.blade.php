<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio ni jeremie</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Welcome to</span>
                            <span class="block text-blue-600">My Portfolio</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Explore my work, skills, and experience in software development. Join me on this journey of innovation and creativity.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            @if (Route::has('login'))
                                <div class="rounded-md shadow">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition duration-300">
                                            Go to Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition duration-300">
                                            Log in
                                        </a>
                                    @endauth
                                </div>
                                @if (Route::has('register'))
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <a href="{{ route('register') }}"
                                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition duration-300">
                                            Register
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

</body>
</html>
