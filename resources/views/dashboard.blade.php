<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <style>
        .property-card {
            perspective: 1000px;
            height: 500px;
            width: 100%;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 1rem;
        }

        .property-card:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            overflow: hidden;
            border-radius: 1rem;
            background: linear-gradient(180deg, #1a202c 0%, #2d3748 100%);
        }

        .card-back {
            transform: rotateY(180deg);
            padding: 1.5rem;
        }

        .blockchain-badge {
            background: linear-gradient(45deg, #00dc82, #3b82f6);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
        }

        .card-back::-webkit-scrollbar {
            display: none;
        }

        .card-back {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Navigation -->
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="https://cdn-icons-png.flaticon.com/512/8059/8059008.png"
                     alt="BlockEstate Logo"
                     class="w-8 h-8">
                <span class="text-2xl font-bold">BlockEstate</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="#featured" class="hover:text-emerald-400 transition-colors">Featured</a>
                <a href="#transactions" class="hover:text-emerald-400 transition-colors">My Transactions</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg font-medium transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative h-[400px] mb-12">
        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1920&q=80"
             alt="Luxury Estate Hero"
             class="w-full h-full object-cover brightness-50">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center px-4">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white">Find Your Dream Property</h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                    Secure real estate transactions through blockchain technology
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <!-- Search and Filters -->
        <div class="mb-12 bg-gray-800/50 p-6 rounded-xl border border-gray-700">
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" 
                       placeholder="Search properties..."
                       class="flex-1 bg-gray-900 rounded-lg p-3 text-white focus:ring-2 focus:ring-emerald-500">
                <select class="bg-gray-900 text-white rounded-lg p-3 focus:ring-2 focus:ring-emerald-500">
                    <option value="">All Types</option>
                    <option>Residential</option>
                    <option>Commercial</option>
                    <option>Land</option>
                </select>
                <button class="bg-emerald-600 hover:bg-emerald-700 px-6 py-3 rounded-lg font-medium transition-colors">
                    Filter
                </button>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @php
                $properties = [
                    [
                        'image' => 'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?auto=format&fit=crop&w=800&h=600&q=80',
                        'title' => 'Luxury Modern Villa',
                        'location' => 'Dubai Marina, UAE',
                        'beds' => rand(3,6),
                        'baths' => rand(2,4),
                        'area' => rand(250,450),
                        'price' => number_format(rand(40, 65)/10, 1).' ETH',
                        'usd' => '$'.rand(1,2).'.'.rand(0,9).'M',
                        'description' => 'Stunning contemporary villa with floor-to-ceiling windows, smart home automation, and private beach access.',
                        'features' => ['Infinity Pool', 'Smart Home', 'Security', '3 Garages'],
                        'contract' => '0x' . substr(str_shuffle(str_repeat('0123456789abcdef', 4)), 0, 8) // Generate a shorter random hex string
                    ],
                    [
                        'image' => 'https://images.unsplash.com/photo-1605146769289-440113cc3d00?auto=format&fit=crop&w=800&h=600&q=80',
                        'title' => 'Beachfront Penthouse',
                        'location' => 'Miami Beach, USA',
                        'beds' => rand(2,4),
                        'baths' => rand(2,3),
                        'area' => rand(180,300),
                        'price' => number_format(rand(30, 55)/10, 1).' ETH',
                        'usd' => '$'.rand(1,2).'.'.rand(0,9).'M',
                        'description' => 'Luxurious penthouse with panoramic ocean views and direct beach access.',
                        'features' => ['Rooftop Terrace', 'Home Theater', 'Concierge', '2 Garages'],
                        'contract' => '0x' . substr(str_shuffle(str_repeat('0123456789abcdef', 4)), 0, 8)
                    ],
                    [
                        'image' => 'https://images.pexels.com/photos/129112/pexels-photo-129112.jpeg', 
                        'title' => 'Rustic Farmhouse',
                        'location' => 'Tuscany, Italy',
                        'beds' => 4,
                        'baths' => 3,
                        'area' => 350,
                        'price' => '45.5 ETH',
                        'usd' => '$1.8M',
                        'description' => 'Charming farmhouse nestled in the Tuscan countryside, featuring breathtaking views and a tranquil setting.',
                        'features' => ['Vineyard', 'Outdoor Kitchen', 'Fireplace', 'Large Garden'],
                        'contract' => '0x' . substr(str_shuffle(str_repeat('0123456789abcdef', 4)), 0, 8)
                    ],
                ];
            @endphp

            @foreach($properties as $property)
                <div class="property-card hover-scale">
                    <div class="card-inner">
                        <!-- Front of Card -->
                        <div class="card-front">
                            <div class="relative h-64">
                                <img src="{{ $property['image'] }}" 
                                     class="w-full h-full object-cover rounded-t-xl">
                                <div class="absolute top-4 right-4 blockchain-badge text-white px-4 py-2 rounded-full text-sm font-bold">
                                    Verified NFT
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent p-4">
                                    <h3 class="text-xl font-bold text-white">{{ $property['title'] }}</h3>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <i class="fas fa-map-marker-alt text-emerald-400 text-sm"></i>
                                        <span class="text-gray-300 text-sm">{{ $property['location'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div class="text-center">
                                        <div class="text-emerald-400 font-bold text-lg">{{ $property['beds'] }}</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Beds</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-emerald-400 font-bold text-lg">{{ $property['baths'] }}</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Baths</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-emerald-400 font-bold text-lg">{{ $property['area'] }}m²</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Area</div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center border-t border-gray-700 pt-4">
                                    <div>
                                        <div class="text-xs text-gray-400">Current Price</div>
                                        <div class="text-2xl font-bold text-emerald-400">{{ $property['price'] }}</div>
                                    </div>
                                    <span class="text-xs text-emerald-400 bg-emerald-400/10 px-3 py-1 rounded-full">{{ $property['usd'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Back of Card -->
                        <div class="card-back">
                            <div class="h-full flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-bold mb-4 text-white">Property Details</h3>
                                    <div class="space-y-4">
                                        <div class="bg-gray-700/30 p-3 rounded-lg">
                                            <p class="text-sm text-gray-300 leading-relaxed">
                                                {{ $property['description'] }}
                                            </p>
                                        </div>
                                        
                                        <div class="grid grid-cols-2 gap-3">
                                            @foreach($property['features'] as $feature)
                                                <div class="flex items-center space-x-2 text-emerald-400">
                                                    <i class="fas fa-{{ $feature == 'Security' ? 'shield-alt' : (strtolower($feature)) }} text-sm"></i>
                                                    <span class="text-sm text-gray-300">{{ $feature }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="bg-gray-700/30 p-3 rounded-lg">
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-400">Contract Address:</span>
                                            <span class="text-emerald-400 font-mono">{{ $property['contract'] }}</span>
                                        </div>
                                    </div>
                                    <button class="w-full bg-emerald-500 hover:bg-emerald-600 px-6 py-3 rounded-lg font-medium transition-colors mt-4 text-sm flex items-center justify-center">
                                        <i class="fas fa-wallet mr-2"></i>
                                        Connect Wallet to Purchase
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 border-t border-gray-800 mt-24">
            <div class="container mx-auto px-6 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <img src="https://cdn-icons-png.flaticon.com/512/8059/8059008.png" 
                                 alt="BlockEstate Logo"
                                 class="w-8 h-8">
                            <span class="text-xl font-bold">BlockEstate</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Revolutionizing real estate through blockchain technology. Secure, transparent, and efficient property transactions.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="space-y-4">
                        <h4 class="text-emerald-400 font-semibold mb-2">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">About Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">How It Works</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">FAQ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="space-y-4">
                        <h4 class="text-emerald-400 font-semibold mb-2">Contact</h4>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-map-marker-alt text-emerald-400"></i>
                                <span>Blockchain Street, Crypto Valley</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-phone text-emerald-400"></i>
                                <span>+1 (555) 123-4567</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-envelope text-emerald-400"></i>
                                <span>info@blockestate.com</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Social & Payments -->
                    <div class="space-y-4">
                        <h4 class="text-emerald-400 font-semibold mb-2">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-emerald-400 transition-colors">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                        <div class="mt-4 border-t border-gray-800 pt-4">
                            <h4 class="text-emerald-400 font-semibold mb-2">Accepted Payments</h4>
                            <div class="flex space-x-3">
                                <img src="https://cdn-icons-png.flaticon.com/512/825/825462.png" class="h-8" alt="Bitcoin">
                                <img src="https://cdn-icons-png.flaticon.com/512/4125/4125333.png" class="h-8" alt="Ethereum">
                                <img src="https://cdn-icons-png.flaticon.com/512/6001/6001367.png" class="h-8" alt="Binance">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                    <p class="text-gray-500 text-sm">
                        © 2024 BlockEstate. All rights reserved.<br>
                        <span class="block mt-1 text-xs">Powered by Blockchain Technology</span>
                    </p>
                </div>
            </div>
        </footer>
</x-app-layout>
