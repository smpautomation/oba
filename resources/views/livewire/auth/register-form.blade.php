<div class="max-w-2xl mx-auto">
    <div class="card-hover-effect rounded-3xl p-4 bg-white/10 border border-white/20 shadow-2xl">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 mb-4 glow-effect">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-shimmer mb-3">
                Create Your Account
            </h3>
        </div>

        <form wire:submit="register" class="space-y-6">
            <!-- Progress Indicator -->
            <div class="flex items-center justify-center mb-8">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <div class="w-8 h-1 bg-blue-500/30 rounded"></div>
                    <div class="w-3 h-3 rounded-full bg-blue-500/50"></div>
                    <div class="w-8 h-1 bg-blue-500/30 rounded"></div>
                    <div class="w-3 h-3 rounded-full bg-blue-500/30"></div>
                </div>
            </div>

            <!-- Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div class="form-group">
                    <label class="form-label">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Full Name
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="input-container">
                        <input
                            type="text"
                            wire:model.blur="name"
                            placeholder="Enter your full name"
                            class="enhanced-input @error('name') error @enderror"
                        >
                        <div class="input-glow"></div>
                    </div>
                    @error('name')
                        <div class="error-message">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ID Number Field -->
                <div class="form-group">
                    <label class="form-label">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                            <path d="M6 8h8v2H6V8z"/>
                        </svg>
                        ID Number
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="input-container">
                        <input
                            type="text"
                            wire:model.blur="id_number"
                            placeholder="Enter your ID number"
                            class="enhanced-input @error('id_number') error @enderror"
                        >
                        <div class="input-glow"></div>
                    </div>
                    @error('id_number')
                        <div class="error-message">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Email Field - Full Width -->
            <div class="form-group">
                <label class="form-label">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    Email Address
                    <span class="text-red-400">*</span>
                </label>
                <div class="input-container">
                    <input
                        type="email"
                        wire:model.blur="email"
                        placeholder="Enter your email address"
                        class="enhanced-input @error('email') error @enderror"
                    >
                    <div class="input-glow"></div>
                </div>
                @error('email')
                    <div class="error-message">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Account Type Info -->
            <div class="flex items-center space-x-3 p-4 bg-blue-500/10 rounded-xl border border-blue-400/20">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Standard User Account</h4>
                    <p class="text-white/70 text-sm">
                        You'll be registered as a standard user. Account upgrades can be requested from administrators.
                    </p>
                </div>
            </div>

            <!-- Password Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="form-label">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                        Password
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="input-container">
                        <input
                            type="password"
                            wire:model="password"
                            placeholder="Minimum 8 characters"
                            class="enhanced-input @error('password') error @enderror"
                        >
                        <div class="input-glow"></div>
                    </div>
                    @error('password')
                        <div class="error-message">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Confirm Password
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="input-container">
                        <input
                            type="password"
                            wire:model="password_confirmation"
                            placeholder="Repeat your password"
                            class="enhanced-input"
                        >
                        <div class="input-glow"></div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="premium-button w-full"
                wire:loading.attr="disabled"
            >
                <div class="button-bg"></div>
                <div class="button-content">
                    <span wire:loading.remove class="flex items-center justify-center space-x-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-lg font-semibold">Create My Account</span>
                    </span>
                    <span wire:loading class="flex items-center justify-center space-x-3">
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-lg font-semibold">Creating Account...</span>
                    </span>
                </div>
            </button>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8 pt-6 border-t border-white/10">
            <p class="text-white/70 text-sm mb-3">
                Already have an account?
            </p>
            <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 text-blue-300 hover:text-blue-200 transition-colors font-medium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0L3 11.414A1.997 1.997 0 013 10a1.997 1.997 0 010-1.414L6.293 5.293a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                <span>Back to Sign In</span>
            </a>
        </div>
    </div>
</div>
