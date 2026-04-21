@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8">
        <div class="flex gap-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 bg-white/5 border border-white/10 rounded">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 bg-white/5 border border-white/10 rounded hover:bg-white/10">
                    ‹
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 bg-blue-800 rounded">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-2 bg-white/5 border border-white/10 rounded hover:bg-white/10">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 bg-white/5 border border-white/10 rounded hover:bg-white/10">
                    ›
                </a>
            @else
                <span class="px-3 py-2 bg-white/5 border border-white/10 rounded">
                    ›
                </span>
            @endif

        </div>
    </nav>
@endif