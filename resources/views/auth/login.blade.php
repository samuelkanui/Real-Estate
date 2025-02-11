<x-guest-layout>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #00dc82, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <!-- Navigation -->
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-emerald-400" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 0L48 16V32L32 48L16 32V16L32 0Z" fill="currentColor"/>
                    <path d="M48 32L32 48L16 32M32 0L48 16V32L32 48L16 32V16L32 0" stroke="currentColor" stroke-width="2"/>
                    <path d="M32 16L40 24V32L32 40L24 32V24L32 16Z" fill="currentColor" fill-opacity="0.2"/>
                </svg>
                <span class="text-2xl font-bold">BlockEstate</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('register') }}" class="hover:text-emerald-400 transition-colors">Register</a>
                <a href="{{ route('login') }}" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg font-medium transition-colors">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-20">
        <div class="max-w-2xl mx-auto bg-gray-800/50 p-8 rounded-xl border border-gray-700">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Welcome Back</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-emerald-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2" for="email">Email</label>
                    <input id="email" 
                           class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500"
                           type="email" 
                           name="email" 
                           :value="old('email')" 
                           required 
                           autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2" for="password">Password</label>
                    <input id="password" 
                           class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500"
                           type="password" 
                           name="password" 
                           required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center space-x-2">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-600 bg-gray-700 text-emerald-500 focus:ring-emerald-500"
                               name="remember">
                        <span class="text-gray-300 text-sm">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-gray-400 hover:text-emerald-400 transition-colors text-sm" 
                           href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" 
                        class="w-full bg-emerald-500 hover:bg-emerald-600 px-6 py-3 rounded-lg font-medium transition-colors">
                    {{ __('Log in') }}
                </button>
            </form>
        </div>
    </div>

</x-guest-layout>