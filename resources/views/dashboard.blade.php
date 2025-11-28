<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <!-- Session Messages (Success/Error Notifications) -->
        @if (session('success'))
            <div id="success-message" class="rounded-xl bg-gradient-to-r from-emerald-500 to-green-600 p-4 text-sm font-medium text-white shadow-lg dark:from-emerald-600 dark:to-green-700" role="alert">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>

            <script>
                setTimeout(() => {
                    const msg = document.getElementById('success-message');
                    if (msg) {
                        msg.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                        setTimeout(() => msg.remove(), 500);
                    }
                }, 3000);
            </script>

        @endif
        @if (session('error'))
            <div class="rounded-xl bg-gradient-to-r from-red-500 to-rose-600 p-4 text-sm font-medium text-white shadow-lg dark:from-red-600 dark:to-rose-700" role="alert">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif


        <!-- Stats Cards -->
        <div class="grid auto-rows-min gap-6 md:grid-cols-3">
            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-500 via-orange-500 to-red-500 p-6 shadow-xl transition-transform duration-300 hover:scale-105 dark:from-amber-600 dark:via-orange-600 dark:to-red-600">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNGMwIDEuMTA0LS44OTYgMi0yIDJIMjZjLTEuMTA0IDAtMi0uODk2LTItMlYyNmMwLTEuMTA0Ljg5Ni0yIDItMmg4YzEuMTA0IDAgMiAuODk2IDIgMnY4eiIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwuMSkiLz48L2c+PC9zdmc+')] opacity-20"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/90">Total Menu Items</p>
                        <h3 class="mt-2 text-4xl font-bold text-white drop-shadow-lg">{{ number_format($totalItems) }}</h3>
                        <div class="mt-2 text-sm font-medium text-white/80">Main Dishes, Sides, Desserts</div>
                    </div>
                    <div class="rounded-2xl bg-white/20 p-4 backdrop-blur-sm">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 p-6 shadow-xl transition-transform duration-300 hover:scale-105 dark:from-emerald-600 dark:via-teal-600 dark:to-cyan-600">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNGMwIDEuMTA0LS44OTYgMi0yIDJIMjZjLTEuMTA0IDAtMi0uODk2LTItMlYyNmMwLTEuMTA0Ljg5Ni0yIDItMmg4YzEuMTA0IDAgMiAuODk2IDIgMnY4eiIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwuMSkiLz48L2c+PC9zdmc+')] opacity-20"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/90">Active Categories</p>
                        <h3 class="mt-2 text-4xl font-bold text-white drop-shadow-lg">{{ number_format($totalCategories) }}</h3>
                        <div class="mt-2 text-sm font-medium text-white/80">Appetizers, Mains, Drinks, etc.</div>
                    </div>
                    <div class="rounded-2xl bg-white/20 p-4 backdrop-blur-sm">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-rose-500 via-pink-500 to-purple-500 p-6 shadow-xl transition-transform duration-300 hover:scale-105 dark:from-rose-600 dark:via-pink-600 dark:to-purple-600">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNGMwIDEuMTA0LS44OTYgMi0yIDJIMjZjLTEuMTA0IDAtMi0uODk2LTItMlYyNmMwLTEuMTA0Ljg5Ni0yIDItMmg4YzEuMTA0IDAgMiAuODk2IDIgMnY4eiIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwuMSkiLz48L2c+PC9zdmc+')] opacity-20"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/90">Avg. Menu Price</p>
                        <h3 class="mt-2 text-4xl font-bold text-white drop-shadow-lg">₱{{ number_format($averagePrice, 2) }}</h3>
                        <div class="mt-2 text-sm font-medium text-white/80">Calculated from all items</div>
                    </div>
                    <div class="rounded-2xl bg-white/20 p-4 backdrop-blur-sm">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Management Section -->
        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-orange-200/50 bg-gradient-to-br from-white via-amber-50/30 to-orange-50/50 shadow-xl dark:border-orange-800/30 dark:from-neutral-800 dark:via-neutral-800 dark:to-neutral-900">
            <div class="flex h-full flex-col p-6">
                <!-- Add New Menu Item Form -->
                <div class="mb-6 rounded-2xl border border-orange-200/50 bg-gradient-to-br from-white to-amber-50/50 p-6 shadow-lg dark:border-orange-800/30 dark:from-neutral-800/80 dark:to-neutral-900/80">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-xl bg-gradient-to-br from-orange-500 to-amber-500 p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-neutral-900 dark:text-neutral-100">Add New Menu Item</h2>
                            <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">Enter the details for the new dish, including its category.</p>
                        </div>
                    </div>
                    <form action="{{ route('menu-items.store') }}" method="POST" class="grid gap-4 md:grid-cols-2">
                        @csrf
                        <div>
                            <label for="add_name" class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Item Name</label>
                            <input id="add_name" name="name" type="text" value="{{ old('name') }}" placeholder="e.g., Grilled Salmon" required autofocus class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                            @error('name')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="add_price" class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Price (₱)</label>
                            <input id="add_price" name="price" type="number" value="{{ old('price') }}" placeholder="e.g., 299.99" step="0.01" required class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                            @error('price')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="add_category" class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Category</label>
                            <select id="add_category" name="category_id" class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="add_description" class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Description</label>
                            <input id="add_description" name="description" type="text" value="{{ old('description') }}" placeholder="Enter an optional description..." class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                            @error('description')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <button type="submit" class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 px-8 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-500/50">
                                <span class="relative z-10 flex items-center gap-2">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Menu Item
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Menu List Table -->
                <div class="flex-1 overflow-auto">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-neutral-900 dark:text-neutral-100">Menu List</h2>
                    </div>
                    <div class="overflow-x-auto rounded-xl border border-orange-200/50 bg-white shadow-lg dark:border-orange-800/30 dark:bg-neutral-800/50">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b-2 border-orange-200/50 bg-gradient-to-r from-orange-50 to-amber-50 dark:border-orange-800/30 dark:from-neutral-800 dark:to-neutral-900">
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">#</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Price</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Description</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-orange-100/50 dark:divide-orange-900/30">
                                @forelse($menuItems as $menuItem)
                                    <tr class="transition-all hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-amber-50/50 dark:hover:from-neutral-800/50 dark:hover:to-neutral-900/50">
                                        <td class="px-6 py-4 text-sm font-semibold text-neutral-700 dark:text-neutral-300">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-neutral-900 dark:text-neutral-100">{{ $menuItem->name }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 rounded-lg bg-gradient-to-r from-emerald-500 to-green-600 px-3 py-1 text-sm font-bold text-white shadow-md">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                                </svg>
                                                ₱{{ number_format($menuItem->price, 2) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">{{ $menuItem->description ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex items-center gap-3">
                                                <button
                                                   onclick='editMenuItems(  {{ $menuItem->id }}, @json($menuItem->name), @json($menuItem->price), @json($menuItem->description), @json($menuItem->category_id) )'
                                                    class="flex items-center gap-1 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 px-4 py-2 text-xs font-semibold text-white shadow-md transition-all hover:scale-105 hover:shadow-lg dark:from-blue-600 dark:to-cyan-600">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <form action="{{ route('menu-items.destroy', $menuItem) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this menu item?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center gap-1 rounded-lg bg-gradient-to-r from-red-500 to-rose-600 px-4 py-2 text-xs font-semibold text-white shadow-md transition-all hover:scale-105 hover:shadow-lg dark:from-red-600 dark:to-rose-700">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center gap-3">
                                                <div class="rounded-full bg-orange-100 p-4 dark:bg-orange-900/30">
                                                    <svg class="h-12 w-12 text-orange-500 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-semibold text-neutral-500 dark:text-neutral-400">No Menu Items Found</p>
                                                <p class="text-xs text-neutral-400 dark:text-neutral-500">Add your first menu item above!</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Menu Item Modal -->
<div id="editMenuModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="w-full max-w-2xl rounded-2xl border-2 border-orange-200/50 bg-gradient-to-br from-white via-amber-50/30 to-orange-50/50 p-8 shadow-2xl dark:border-orange-800/30 dark:from-neutral-800 dark:via-neutral-800 dark:to-neutral-900">
        <div class="mb-6 flex items-center gap-3">
            <div class="rounded-xl bg-gradient-to-br from-orange-500 to-amber-500 p-2">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-neutral-900 dark:text-neutral-100">Edit Menu Item</h2>
        </div>

        <form id="editMenuForm" method="POST">
            @csrf
            @method('PUT')

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Name</label>
                    <input type="text" id="edit_name" name="name" required
                           class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Price</label>
                    <input type="number" id="edit_price" name="price" step="0.01" required
                           class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Description</label>
                    <input type="text" id="edit_description" name="description"
                           class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Category</label>
                    <select id="edit_category_id" name="category_id" required
                            class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeEditMenuModal()"
                        class="rounded-xl border-2 border-neutral-300 bg-white px-6 py-3 text-sm font-semibold text-neutral-700 transition-all hover:bg-neutral-50 hover:shadow-md dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700">
                    Cancel
                </button>

                <button type="submit"
                        class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-500/50">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Menu Item
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function editMenuItems(id, name, price, description, categoryId) {
        const modal = document.getElementById('editMenuModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.getElementById('editMenuForm').action = `/menu-items/${id}`;

        document.getElementById('edit_name').value = name;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_description').value = description ?? '';
        document.getElementById('edit_category_id').value = categoryId ?? '';
    }

    function closeEditMenuModal() {
        const modal = document.getElementById('editMenuModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modal when clicking outside
    document.getElementById('editMenuModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditMenuModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('editMenuModal');
            if (!modal.classList.contains('hidden')) {
                closeEditMenuModal();
            }
        }
    });
</script>


</x-layouts.app>
