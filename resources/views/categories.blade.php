<x-layouts.app :title="__('Category')">
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

        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-orange-200/50 bg-gradient-to-br from-white via-amber-50/30 to-orange-50/50 shadow-xl dark:border-orange-800/30 dark:from-neutral-800 dark:via-neutral-800 dark:to-neutral-900">
            <div class="flex h-full flex-col p-6">
                <!-- Add New Category Form -->
                <div class="mb-6 rounded-2xl border border-orange-200/50 bg-gradient-to-br from-white to-amber-50/50 p-6 shadow-lg dark:border-orange-800/30 dark:from-neutral-800/80 dark:to-neutral-900/80">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-xl bg-gradient-to-br from-orange-500 to-amber-500 p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-neutral-900 dark:text-neutral-100">Add New Menu Category</h2>
                            <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">Create a new category to organize your menu items.</p>
                        </div>
                    </div>
                    <form action="{{ route('categories.store') }}" method="POST" class="grid gap-4 md:grid-cols-2">
                        @csrf
                        <div>
                            <label
                                for="add_category_name"
                                class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Category Name</label>
                            <input
                                type="text"
                                placeholder="e.g., Appetizers, Main Course"
                                name="name"
                                id="add_category_name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                            @error('name')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label
                                for="add_category_description"
                                class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Description</label>
                            <input
                                type="text"
                                placeholder="Enter category description"
                                name="description"
                                id="add_category_description"
                                value="{{ old('description') }}"
                                class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
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
                                    Add Category
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Categories Table -->
                <div class="flex-1 overflow-auto">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 p-2">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-neutral-900 dark:text-neutral-100">Category List</h2>
                    </div>
                    <div class="overflow-x-auto rounded-xl border border-orange-200/50 bg-white shadow-lg dark:border-orange-800/30 dark:bg-neutral-800/50">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b-2 border-orange-200/50 bg-gradient-to-r from-orange-50 to-amber-50 dark:border-orange-800/30 dark:from-neutral-800 dark:to-neutral-900">
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">#</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Description</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">QTY</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-orange-900 dark:text-orange-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-orange-100/50 dark:divide-orange-900/30">
                                @forelse ($categories as $category)
                                    <tr class="transition-all hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-amber-50/50 dark:hover:from-neutral-800/50 dark:hover:to-neutral-900/50">
                                        <td class="px-6 py-4 text-sm font-semibold text-neutral-700 dark:text-neutral-300">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-neutral-900 dark:text-neutral-100">{{ $category->name }}</td>
                                        <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">{{ $category->description ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 rounded-lg bg-gradient-to-r from-emerald-500 to-green-600 px-3 py-1 text-sm font-bold text-white shadow-md">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                                {{ $category->menu_items_count }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex items-center gap-3">
                                                <button
                                                   onclick='editCategory(  {{ $category->id }}, @json($category->name), @json($category->description) )'
                                                    class="flex items-center gap-1 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 px-4 py-2 text-xs font-semibold text-white shadow-md transition-all hover:scale-105 hover:shadow-lg dark:from-blue-600 dark:to-cyan-600">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <form method="POST" action="{{ route('categories.destroy', $category) }}" onsubmit="return confirm('Are you sure you want to delete this category?')" class="inline">
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
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-semibold text-neutral-500 dark:text-neutral-400">No Categories Found</p>
                                                <p class="text-xs text-neutral-400 dark:text-neutral-500">Add your first category above!</p>
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

<div id="editCategoryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="w-full max-w-2xl rounded-2xl border-2 border-orange-200/50 bg-gradient-to-br from-white via-amber-50/30 to-orange-50/50 p-8 shadow-2xl dark:border-orange-800/30 dark:from-neutral-800 dark:via-neutral-800 dark:to-neutral-900">
        <div class="mb-6 flex items-center gap-3">
            <div class="rounded-xl bg-gradient-to-br from-orange-500 to-amber-500 p-2">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-neutral-900 dark:text-neutral-100">Edit Category</h2>
        </div>

        <form id="editCategoryForm" method="POST">
            @csrf
            @method('PUT')

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Category Name</label>
                    <input type="text" id="edit_category_name" name="name" required
                           class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Description</label>
                    <input type="text" id="edit_description" name="description"
                           class="w-full rounded-xl border-2 border-orange-200 bg-white px-4 py-3 text-sm transition-all focus:border-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-500/20 dark:border-orange-800/50 dark:bg-neutral-800 dark:text-neutral-100 dark:focus:border-orange-500">
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeEditCategoryModal()"
                        class="rounded-xl border-2 border-neutral-300 bg-white px-6 py-3 text-sm font-semibold text-neutral-700 transition-all hover:bg-neutral-50 hover:shadow-md dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700">
                    Cancel
                </button>

                <button type="submit"
                        class="group relative overflow-hidden rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-500/50">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Category
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function editCategory(id, name, description) {
        const modal = document.getElementById('editCategoryModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.getElementById('editCategoryForm').action = `/categories/${id}`;
        document.getElementById('edit_category_name').value = name;
        document.getElementById('edit_description').value = description ?? '';
    }

    function closeEditCategoryModal() {
        const modal = document.getElementById('editCategoryModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Close modal when clicking outside
    document.getElementById('editCategoryModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditCategoryModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('editCategoryModal');
            if (!modal.classList.contains('hidden')) {
                closeEditCategoryModal();
            }
        }
    });
</script>


</x-layouts.app>
