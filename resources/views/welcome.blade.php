<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comunidad de Links</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: black;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header con botones de Login y Register -->
    <header class="w-full bg-gray-900 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Comunidad de Links</h1>

            @if (Route::has('login'))
                <nav class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-gray-800 rounded-md hover:bg-gray-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 font-bold rounded-md hover:bg-gray-500">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 ms-2 py-2 bg-white rounded-md hover:bg-gray-500 text-black font-bold">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center flex-grow">
        <!-- Logo centrado -->
        <img src="{{ asset('images/logo_community_links.png') }}" alt="Logo"
            class="w-16 h-auto mb-5 sm:w-24 md:w-32 lg:w-40 mr-4">

        <!-- Texto corto -->
        <h1 class="text-2xl font-bold text-white">Welcome to Comunidad de Links</h1>
        <p class="text-gray-600 text-lg mb-6">Accede a nuestros recursos, comparte tus ideas, y únete a nuestra
            comunidad.</p>

        <!-- Botones de Login y Register -->
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-500">
                Log in
            </a>

            <a href="{{ route('register') }}"
                class="font-bold px-6 ms-2 py-3 bg-white text-dark rounded-md hover:bg-blue-500">
                Register
            </a>
        </div>
    </main>

    <!-- Footer opcional -->
    <footer class="w-full bg-gray-900 text-white p-4 text-center">
        <p>&copy; {{ date('Y') }} Comunidad de Links. Todos los derechos reservados.</p>
    </footer>
</body>

</html>