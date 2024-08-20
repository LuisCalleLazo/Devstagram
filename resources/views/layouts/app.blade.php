<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                Devstagram
            </h1>

            @auth
                <nav class="flex gap-2">
                    <a href="#"
                        class="font-bold text-gray-600 text-sm">
                        Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit"
                        class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar session
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2">
                    <a href="{{ route('login')}}"
                        class="font-bold uppercase text-gray-600 text-sm">
                        Login
                    </a>
                    <a href="{{ route('create-account') }}"
                        class="font-bold uppercase text-gray-600 text-sm">
                        Crear Cuenta
                    </a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="conteiner mx-auto mt-10">
        <h2 class="text-center mb-10 text-3xl font-black">
            @yield('title')
        </h2>
        @yield('content')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Devstagram - Todos los derechos reservados | {{ now()->month }}
    </footer>
</body>
</html>
