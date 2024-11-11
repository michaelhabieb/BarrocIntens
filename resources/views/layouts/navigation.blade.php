<!-- resources/views/layouts/navigation.blade.php -->
<nav class="bg-yellow-500 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/index" class="text-white text-2xl font-semibold">Barroc Intens</a>
        
        <!-- Navigation Links -->
        <div class="space-x-4">
            @guest
                <!-- Link voor niet-ingelogde gebruikers -->
                <a href="{{ route('login') }}" class="text-white">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white">Register</a>
                @endif
            @else
                <!-- Links voor ingelogde gebruikers -->
                <a href="{{ route('index') }}" class="text-white">Home</a>


                <!-- Dit moet later specifiek voor de juiste users worden -->
                <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>


                <a href="" class="text-white">Machines</a>
                <a href="{{ route('contact') }}" class="text-white">Contact</a>
                
                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
