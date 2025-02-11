<x-guest-layout>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #00dc82, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .blockchain-grid {
            background-image: radial-gradient(circle at center, #2d3748 1px, transparent 1px);
            background-size: 20px 20px;
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
                <a href="{{ route('login') }}" class="hover:text-emerald-400 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg font-medium transition-colors">Register</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-20">
        <div class="max-w-2xl mx-auto bg-gray-800/50 p-8 rounded-xl border border-gray-700">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Create Account</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2" for="name">Name</label>
                    <input id="name" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500" 
                           type="text" 
                           name="name" 
                           :value="old('name')" 
                           required 
                           autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2" for="email">Email</label>
                    <input id="email" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500" 
                           type="email" 
                           name="email" 
                           :value="old('email')" 
                           required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2" for="password">Password</label>
                    <input id="password" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500" 
                           type="password" 
                           name="password" 
                           required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-8">
                    <label class="block text-gray-300 mb-2" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500" 
                           type="password" 
                           name="password_confirmation" 
                           required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-gray-400 hover:text-emerald-400 transition-colors" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-3 rounded-lg font-medium transition-colors">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>