<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - OUT OF THE BOX AUDIT</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom-welcome.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom-register.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <main class="hero-gradient min-h-screen relative floating-orbs">
            @guest
            @else
            <livewire:navbar>
            @endguest


            <!-- Registration Section -->
            <div class="relative z-10 flex items-center justify-center px-4 pb-4">
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                        <!-- Logo Section -->
                        <div class="slide-in-up text-center lg:text-left">
                            <div class="inline-flex items-center justify-center w-32 h-32 lg:w-40 lg:h-40 rounded-full mb-6 lg:mb-8">
                                <img src="photo/smp_logo.png" alt="Logo" class="w-28 h-28 lg:w-36 lg:h-36 rounded-full">
                            </div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-shimmer mb-4">
                                Out of the Box Audit
                            </h1>

                        </div>

                        <!-- Registration Form -->
                        <div class="slide-in-up delay-1">
                            <livewire:auth.register-form />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-1/4 left-10 w-2 h-20 bg-white/20 rounded-full transform rotate-12 hidden lg:block"></div>
            <div class="absolute top-1/3 right-20 w-3 h-3 bg-white/30 rounded-full hidden lg:block"></div>
            <div class="absolute bottom-1/4 left-1/4 w-4 h-4 bg-white/20 rounded-full hidden lg:block"></div>
            <div class="absolute bottom-1/3 right-1/3 w-2 h-2 bg-white/40 rounded-full hidden lg:block"></div>
        </main>
        <x-footer></x-footer>
    </body>
</html>
