<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">{{ __('Log in') }}</h2>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div>
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email') }}</label>
            <input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
            <input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="block mt-4">
            <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-blue-500 focus:ring-blue-500" name="remember">
            <label for="remember_me" class="inline-block text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="inline-block text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <a  class="inline-block text-sm text-blue-500 hover:text-blue-800 mr-2" href="{{ route('welcome') }}">
                    {{ __('Back') }}
            </a>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</body>
</html>
