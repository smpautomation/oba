<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OUT OF THE BOX AUDIT</title>

        @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom-welcome.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <main class="hero-gradient min-h-screen relative floating-orbs">
        <livewire:navbar>
        <!-- Hero Section -->
        <div class="relative z-10 flex items-center justify-center px-4 py-12 md:py-20">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Logo and Welcome -->
                <div class="slide-in-up mb-8">
                    <div class="inline-flex items-center justify-center w-32 h-32 rounded-full mb-6 logo-pulse glow-effect">
                        <img src="photo/smp_logo.png" alt="Logo" class="w-24 h-24 rounded-full">
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold text-shimmer mb-4">
                        Welcome Back
                    </h1>
                    <p class="text-xl md:text-2xl text-white/90 mb-2">
                        <span class="typing-effect">Out of the Box Audit Management</span>
                    </p>
                    <p class="text-lg text-white/70 max-w-2xl mx-auto">
                        Streamline your auditing process with our platform for creating, managing, and analyzing audit forms.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="slide-in-up delay-1 flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                    <a href="{{ route('checklist') }}" class="animated-button w-full sm:w-auto inline-flex">
                        <div class="circle"></div>
                        <svg viewBox="0 0 24 24" class="arr-2">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                        <span class="text">Get Started</span>
                        <svg viewBox="0 0 24 24" class="arr-1">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                    </a>
                    
                    {{-- <button class="px-8 py-4 bg-white/10 backdrop-blur-lg border border-white/30 rounded-full text-white font-semibold hover:bg-white/20 transition-all duration-300 hover:scale-105 w-full sm:w-auto">
                        <i class="fas fa-play mr-2"></i>
                        Watch Demo
                    </button> --}}
                </div>

                <!-- Stats Section -->
                {{-- <div class="slide-in-up delay-2 grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="card-hover-effect rounded-2xl p-6 text-center">
                        <div class="text-3xl font-bold stat-counter mb-2">500+</div>
                        <div class="text-white/80">Audits Completed</div>
                    </div>
                    <div class="card-hover-effect rounded-2xl p-6 text-center">
                        <div class="text-3xl font-bold stat-counter mb-2">50+</div>
                        <div class="text-white/80">Active Users</div>
                    </div>
                    <div class="card-hover-effect rounded-2xl p-6 text-center">
                        <div class="text-3xl font-bold stat-counter mb-2">99.9%</div>
                        <div class="text-white/80">Uptime</div>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- Features Section -->
        <div id="features" class="relative z-10 px-4 pb-20">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 slide-in-up delay-3">
                    <h2 class="text-4xl font-bold text-white mb-4">Introducing the Website</h2>
                    <p class="text-white/80 text-lg max-w-2xl mx-auto">
                        Discover the features that make audit management effortless and efficient.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="card-hover-effect rounded-2xl p-8 text-center group">
                        <div class="feature-icon w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-edit text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Create & Edit Forms</h3>
                        <p class="text-white/80">
                            Easily start out of the box audit forms and modify existing ones to fit your specific requirements.
                        </p>
                    </div>

                    <div class="card-hover-effect rounded-2xl p-8 text-center group">
                        <div class="feature-icon w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">View & Analyze</h3>
                        <p class="text-white/80">
                            View list option with detailed summary to track audit progress and results.
                        </p>
                    </div>

                    <div class="card-hover-effect rounded-2xl p-8 text-center group">
                        <div class="feature-icon w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Convenient & Reliable</h3>
                        <p class="text-white/80">
                            Auditing made easier using mobile devices instead of writing. Your audit data is protected and always accessible.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Login Form Section -->
        <div class="relative z-10 px-4 pb-20">
            <div class="max-w-md mx-auto">
                <div class="card-hover-effect rounded-3xl p-8">
                    <h3 class="text-2xl font-bold text-white text-center mb-6">
                        Sign In to Continue
                    </h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-white/90 text-sm font-medium mb-2">Email Address</label>
                            <input type="email" placeholder="Enter your email" class="modern-input w-full px-4 py-3 rounded-xl text-white placeholder-white/60 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-white/90 text-sm font-medium mb-2">Password</label>
                            <input type="password" placeholder="Enter your password" class="modern-input w-full px-4 py-3 rounded-xl text-white placeholder-white/60 focus:outline-none">
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center text-white/80 text-sm">
                                <input type="checkbox" class="mr-2 rounded">
                                Remember me
                            </label>
                            <a href="#" class="text-blue-300 hover:text-blue-200 text-sm">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-6 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                            Sign In
                        </button>
                    </form>
                    <p class="text-center text-white/70 text-sm mt-6">
                        Don't have an account? 
                        <a href="#" class="text-blue-300 hover:text-blue-200">Sign up here</a>
                    </p>
                </div>
            </div>
        </div> --}}

        <!-- Decorative Elements -->
        <div class="absolute top-1/4 left-10 w-2 h-20 bg-white/20 rounded-full transform rotate-12 hidden lg:block"></div>
        <div class="absolute top-1/3 right-20 w-3 h-3 bg-white/30 rounded-full hidden lg:block"></div>
        <div class="absolute bottom-1/4 left-1/4 w-4 h-4 bg-white/20 rounded-full hidden lg:block"></div>
        <div class="absolute bottom-1/3 right-1/3 w-2 h-2 bg-white/40 rounded-full hidden lg:block"></div>
    </main>
    </body>
    <x-footer></x-footer>
</html>
