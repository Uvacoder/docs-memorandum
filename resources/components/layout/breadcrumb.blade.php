@if (is_array($breadcrumb))
    <nav class="flex items-start px-4 py-3 sm:px-6 lg:px-8" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="/" class="text-gray-300 hover:text-gray-400">
                        <!-- Heroicon name: solid/home -->
                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>

            @foreach ($breadcrumb as $item)
                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <span class="ml-4 text-sm font-medium text-gray-400">
                            {{ $item->title }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
@endif
