                <div class="mb-4 flex justify-end">
                    <form method="GET" action="{{ route('menu-items.export') }}" class="inline">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="category_filter" value="{{ request('category_filter') }}">

                        <button type="submit"
                                class="flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export to PDF
                        </button>
                    </form>
                </div>

                <div class="mb-4 flex justify-end">
                    {{-- Export Form --}}
                    <form method="GET" action="{{ route('menu-items.export') }}" class="inline">
                        {{-- Pass current search term to the export --}}
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        
                        {{-- IMPORTANT: Changed 'course_filter' to 'category_id' to match your controller --}}
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    
                        <button type="submit"
                                class="flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500/50">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export to PDF
                        </button>
                    </form>
                </div>