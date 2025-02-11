<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlockEstate - Blockchain-Powered Real Estate Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: 16, 185, 129; /* Use comma separation for RGB values */
            --secondary: 59, 130, 246;
            --accent: 139, 92, 246;
            --easing: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gradient-text {
            background: linear-gradient(45deg, rgb(var(--primary)), rgb(var(--secondary)));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        .parallax-container {
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .blockchain-grid {
            background-image: radial-gradient(circle at center, #2d3748 1px, transparent 1px);
            background-size: 20px 20px;
            transform: translateZ(0);
        }

        .hover-scale {
            transition: transform 0.3s var(--easing), box-shadow 0.3s var(--easing);
        }

        .hover-scale:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .animated-border {
            position: relative;
            overflow: hidden;
            background-clip: padding-box;
        }

        .animated-border::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: -1;
            margin: -2px;
            background: linear-gradient(
                45deg,
                rgba(var(--primary), 0.4),
                rgba(var(--secondary), 0.4),
                rgba(var(--accent), 0.4)
            );
            animation: borderFlow 3s linear infinite;
            border-radius: inherit;
        }

        @keyframes borderFlow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .float-animation {
            animation: float 6s var(--easing) infinite;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s var(--easing);
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }

        .path-animation path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: draw 3s var(--easing) forwards;
        }

        @keyframes draw {
            to { stroke-dashoffset: 0; }
        }

        .stagger-delay:nth-child(1) { transition-delay: 0.1s; }
        .stagger-delay:nth-child(2) { transition-delay: 0.2s; }
        .stagger-delay:nth-child(3) { transition-delay: 0.3s; }
    </style>
</head>
<body class="font-['Inter'] bg-gray-900 text-gray-100 antialiased">
    <!-- Navigation -->
    <nav class="container mx-auto px-6 py-4 sticky top-0 bg-gray-900/80 backdrop-blur-md z-50">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-emerald-400 hover:rotate-180 transition-transform" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 0L48 16V32L32 48L16 32V16L32 0Z" fill="currentColor"/>
                    <path d="M48 32L32 48L16 32M32 0L48 16V32L32 48L16 32V16L32 0" stroke="currentColor" stroke-width="2"/>
                    <path d="M32 16L40 24V32L32 40L24 32V24L32 16Z" fill="currentColor" fill-opacity="0.2"/>
                </svg>
                <span class="text-2xl font-bold tracking-tighter">BlockEstate</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="#features" class="hover:text-emerald-400 transition-colors">Features</a>
                <a href="#how-it-works" class="hover:text-emerald-400 transition-colors">How It Works</a>
                <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg font-medium transition-colors">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Parallax -->
    <section class="container mx-auto px-6 py-20 parallax-container">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Revolutionizing Real Estate with 
                    <span class="gradient-text inline-block float-animation">Blockchain</span> Technology
                </h1>
                <p class="text-xl text-gray-400 mb-8">
                    Experience secure, transparent, and efficient property transactions powered by decentralized blockchain technology.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 px-8 py-4 rounded-lg font-medium text-lg transition-colors">
                        Start Trading
                    </a>
                    <a href="#features" class="border border-emerald-500 text-emerald-500 hover:bg-emerald-500/10 px-8 py-4 rounded-lg font-medium text-lg transition-colors">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 blockchain-grid rounded-xl p-8 hover-scale transform-gpu">
                <svg class="w-full path-animation" viewBox="0 0 600 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M150 250L300 100L450 250L300 400L150 250Z" stroke="#3B82F6" stroke-width="2" fill-opacity="0.1"/>
                    <path d="M300 100L450 250L300 400L150 250L300 100Z" stroke="#10B981" stroke-width="2" fill-opacity="0.1"/>
                    <path d="M225 325L300 400L375 325L300 250L225 325Z" stroke="#8B5CF6" stroke-width="2" fill-opacity="0.1"/>
                    <path d="M300 250L375 175L450 250L375 325L300 250Z" stroke="#3B82F6" stroke-width="2" fill-opacity="0.1"/>
                    <path d="M150 250L225 175L300 250L225 325L150 250Z" stroke="#10B981" stroke-width="2" fill-opacity="0.1"/>
                    <circle cx="300" cy="250" r="30" fill="#10B981"/>
                    <path d="M300 100V250M300 250V400M225 325L300 250L375 325M225 175L300 250L375 175M150 250H450" stroke="#4A5568" stroke-width="2"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Features Section with Scroll Animation -->
    <section id="features" class="bg-gray-800 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-16 text-center fade-in">Why Choose BlockEstate?</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="fade-in stagger-delay bg-gray-700/50 p-8 rounded-xl hover-scale">
                    <div class="w-16 h-16 bg-emerald-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-3xl text-emerald-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Military-Grade Security</h3>
                    <p class="text-gray-400">Immutable blockchain ledger ensures tamper-proof transaction records and ownership history.</p>
                </div>
                <div class="fade-in stagger-delay bg-gray-700/50 p-8 rounded-xl hover-scale">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-3xl text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Instant Settlements</h3>
                    <p class="text-gray-400">Smart contracts automate processes, reducing transaction times from weeks to minutes.</p>
                </div>
                <div class="fade-in stagger-delay bg-gray-700/50 p-8 rounded-xl hover-scale">
                    <div class="w-16 h-16 bg-purple-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-globe text-3xl text-purple-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Global Marketplace</h3>
                    <p class="text-gray-400">Access international properties and investors through our decentralized platform.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="container mx-auto px-6 py-20">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-bold mb-6 fade-in">How It Works</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Transforming real estate transactions through blockchain technology in 3 simple steps</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="fade-in stagger-delay bg-gradient-to-br from-gray-800 to-gray-900 p-8 rounded-xl relative animated-border">
                <div class="absolute top-4 right-4 text-2xl text-emerald-400">01</div>
                <h3 class="text-2xl font-semibold mb-4">List or Discover</h3>
                <p class="text-gray-400">Property owners can tokenize assets while buyers discover opportunities through our decentralized marketplace.</p>
            </div>
            <div class="fade-in stagger-delay bg-gradient-to-br from-gray-800 to-gray-900 p-8 rounded-xl relative animated-border">
                <div class="absolute top-4 right-4 text-2xl text-blue-400">02</div>
                <h3 class="text-2xl font-semibold mb-4">Smart Contracts</h3>
                <p class="text-gray-400">Automated contracts execute terms instantly upon fulfillment of conditions, eliminating intermediaries.</p>
            </div>
            <div class="fade-in stagger-delay bg-gradient-to-br from-gray-800 to-gray-900 p-8 rounded-xl relative animated-border">
                <div class="absolute top-4 right-4 text-2xl text-purple-400">03</div>
                <h3 class="text-2xl font-semibold mb-4">Ownership Transfer</h3>
                <p class="text-gray-400">Securely transfer digital ownership titles instantly recorded on the blockchain network.</p>
            </div>
        </div>
    </section>

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
                            <span>+254798400918</span>
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
                    © 2025 BlockEstate. All rights reserved.<br>
                    <span class="block mt-1 text-xs">Powered by Blockchain Technology</span>
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Parallax effect
        window.addEventListener('scroll', () => {
            const parallaxElements = document.querySelectorAll('.parallax-container');
            const scrollY = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const depth = element.dataset.depth || 1;
                const move = scrollY * depth * 0.1;
                element.style.transform = `translateY(${move}px)`;
            });
        });
    </script>
</body>
</html>
