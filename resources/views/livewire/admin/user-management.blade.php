<div class="container mx-auto px-4 py-8 bg-yellow-50">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-black mb-2">User Management</h1>
            <p class="text-black/70">Manage user accounts and roles</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="card-hover-effect rounded-xl p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-500/20">
                    <svg class="w-8 h-8 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-black/70">Total Users</p>
                    <p class="text-2xl font-bold text-black">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="card-hover-effect rounded-xl p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-500/20">
                    <svg class="w-8 h-8 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-black/70">Admins</p>
                    <p class="text-2xl font-bold text-black">{{ $totalAdmins }}</p>
                </div>
            </div>
        </div>

        <div class="card-hover-effect rounded-xl p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-500/20">
                    <svg class="w-8 h-8 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-black/70">Auditors</p>
                    <p class="text-2xl font-bold text-black">{{ $totalAuditors }}</p>
                </div>
            </div>
        </div>

        <div class="card-hover-effect rounded-xl p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-500/20">
                    <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-black/70">Regular Users</p>
                    <p class="text-2xl font-bold text-black">{{ $totalRegularUsers }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card-hover-effect rounded-xl p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input
                    type="text"
                    wire:model.live="search"
                    placeholder="Search users by name, email, or ID..."
                    class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-black placeholder-white/50 focus:outline-none focus:border-blue-400"
                >
            </div>
            <div>
                <select wire:model.live="selectedRole" class="px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-black focus:outline-none focus:border-blue-400">
                   <option value="">All Roles</option>
                   @foreach($roles as $role)
                       <option value="{{ $role->id }}" class="bg-gray-800">{{ ucfirst($role->name) }}</option>
                   @endforeach
               </select>
           </div>
       </div>
   </div>

   <!-- Users Table -->
   <div class="card-hover-effect rounded-xl overflow-hidden">
       <div class="overflow-x-auto">
           <table class="w-full">
               <thead class="bg-white/5">
                   <tr>
                       <th class="px-6 py-4 text-left text-sm font-semibold text-black/90">User</th>
                       <th class="px-6 py-4 text-left text-sm font-semibold text-black/90">ID Number</th>
                       <th class="px-6 py-4 text-left text-sm font-semibold text-black/90">Role</th>
                       <th class="px-6 py-4 text-left text-sm font-semibold text-black/90">Joined</th>
                       <th class="px-6 py-4 text-left text-sm font-semibold text-black/90">Actions</th>
                   </tr>
               </thead>
               <tbody class="divide-y divide-white/10">
                   @forelse($users as $user)
                       <tr class="hover:bg-white/5 transition-colors">
                           <td class="px-6 py-4">
                               <div class="flex items-center">
                                   <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                       <span class="text-black font-semibold">{{ substr($user->name, 0, 1) }}</span>
                                   </div>
                                   <div class="ml-3">
                                       <div class="text-black font-medium">{{ $user->name }}</div>
                                       <div class="text-black/60 text-sm">{{ $user->email }}</div>
                                   </div>
                               </div>
                           </td>
                           <td class="px-6 py-4 text-black/80">{{ $user->id_number }}</td>
                           <td class="px-6 py-4">
                               <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                   {{ $user->role->name === 'admin' ? 'bg-red-500/20 text-red-300' : '' }}
                                   {{ $user->role->name === 'auditor' ? 'bg-green-500/20 text-green-300' : '' }}
                                   {{ $user->role->name === 'user' ? 'bg-blue-500/20 text-blue-300' : '' }}
                               ">
                                   {{ ucfirst($user->role->name) }}
                               </span>
                           </td>
                           <td class="px-6 py-4 text-black/80">
                               {{ $user->created_at->format('M d, Y') }}
                           </td>
                           <td class="px-6 py-4">
                               <button
                                   wire:click="editUser({{ $user->id }})"
                                   class="text-blue-400 hover:text-blue-300 font-medium text-sm"
                               >
                                   Change Role
                               </button>
                           </td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="5" class="px-6 py-8 text-center text-black/60">
                               No users found matching your criteria.
                           </td>
                       </tr>
                   @endforelse
               </tbody>
           </table>
       </div>

       <!-- Pagination -->
       <div class="px-6 py-4 border-t border-white/10">
           {{ $users->links() }}
       </div>
   </div>

   <!-- Edit Role Modal -->
   @if($editingUser)
       <div class="fixed inset-0 bg-slate-300/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">
           <div class="card-hover-effect rounded-2xl p-6 w-full max-w-md bg-slate-500">
               <div class="flex items-center justify-between mb-6">
                   <h3 class="text-xl font-bold text-black">Change User Role</h3>
                   <button wire:click="cancelEdit" class="text-black/60 hover:text-black">
                       <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                       </svg>
                   </button>
               </div>

               <div class="mb-6">
                   <div class="flex items-center mb-4">
                       <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                           <span class="text-black font-semibold">{{ substr($editingUser->name, 0, 1) }}</span>
                       </div>
                       <div class="ml-3">
                           <div class="text-black font-medium">{{ $editingUser->name }}</div>
                           <div class="text-black/60 text-sm">{{ $editingUser->email }}</div>
                       </div>
                   </div>

                   <div class="space-y-3">
                       <label class="block text-black/90 text-sm font-medium">Select New Role</label>
                       @foreach($roles as $role)
                           <label class="flex items-center p-3 bg-white/5 rounded-lg cursor-pointer hover:bg-white/10 transition-colors">
                               <input
                                   type="radio"
                                   wire:model="newRole"
                                   value="{{ $role->id }}"
                                   class="w-4 h-4 text-blue-600 bg-transparent border-white/30"
                               >
                               <div class="ml-3">
                                   <div class="text-black font-medium">{{ ucfirst($role->name) }}</div>
                                   <div class="text-black/60 text-sm">{{ $role->description }}</div>
                               </div>
                           </label>
                       @endforeach
                   </div>
               </div>

               <div class="flex gap-3">
                   <button
                       wire:click="updateUserRole"
                       class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-black py-2 px-4 rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all"
                   >
                       Update Role
                   </button>
                   <button
                       wire:click="cancelEdit"
                       class="flex-1 bg-white/10 text-black py-2 px-4 rounded-lg font-medium hover:bg-white/20 transition-all"
                   >
                       Cancel
                   </button>
               </div>
           </div>
       </div>
   @endif

   <!-- Flash Messages -->
   @if (session()->has('success'))
       <div class="fixed top-4 right-4 bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded-lg backdrop-blur-sm z-50">
           {{ session('success') }}
       </div>
   @endif
</div>
