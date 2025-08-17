<div class="card-hover-effect rounded-3xl p-8 max-w-md mx-auto">
    <h3 class="text-2xl font-bold text-white text-center mb-6">
        Sign In to Continue
    </h3>

    <form wire:submit="login" class="space-y-6">
        <div>
            <label class="block text-white/90 text-sm font-medium mb-2">ID Number</label>
            <input
                type="text"
                wire:model="id_number"
                placeholder="Enter your ID number"
                class="modern-input w-full px-4 py-3 rounded-xl text-white placeholder-white/60 focus:outline-none @error('id_number') border-red-500 @enderror"
            >
            @error('id_number')
                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-white/90 text-sm font-medium mb-2">Password</label>
            <input
                type="password"
                wire:model="password"
                placeholder="Enter your password"
                class="modern-input w-full px-4 py-3 rounded-xl text-white placeholder-white/60 focus:outline-none @error('password') border-red-500 @enderror"
            >
            @error('password')
                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center text-white/80 text-sm">
                <input type="checkbox" wire:model="remember" class="mr-2 rounded">
                Remember me
            </label>
            {{-- <a href="#" class="text-blue-300 hover:text-blue-200 text-sm">Forgot password?</a> --}}
        </div>

        <button
            type="submit"
            class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-6 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105"
            wire:loading.attr="disabled"
        >
            <span wire:loading.remove>Sign In</span>
            <span wire:loading>Signing In...</span>
        </button>
    </form>

    <p class="text-center text-white/70 text-sm mt-6">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-blue-300 hover:text-blue-200">Sign up here</a>
    </p>
</div>
