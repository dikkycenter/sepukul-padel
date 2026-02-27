<div>
    <div class="bg-white py-12 px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($events as $event)
            <a href="{{ route('event.detail', $event->slug) }}"
            class="group relative block rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-500">

                {{-- Image --}}
                <img 
                    src="{{ asset('storage/' . $event->image) }}"
                    alt="{{ $event->title }}"
                    class="w-full h-60 object-cover transition duration-700 group-hover:scale-105"
                    loading="lazy"
                >

                {{-- Dark Overlay --}}
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/75 transition duration-500"></div>

                {{-- Content Overlay --}}
                <div class="absolute inset-0 flex flex-col justify-end p-6 
                            opacity-0 translate-y-6 
                            group-hover:opacity-100 group-hover:translate-y-0
                            transition duration-500">

                    <h3 class="text-white text-xl font-semibold mb-2 capitalize">
                        {{ $event->title }}
                    </h3>

                    @if($event->event_date)
                        <div class="flex items-center gap-2 text-sm text-white/80">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <span>
                                {{ $event->event_date->translatedFormat('d F Y') }}
                            </span>
                            <span class="text-xs">
                                ({{ $event->event_date->diffForHumans() }})
                            </span>
                        </div>
                    @endif

                </div>

            </a>
        @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-8 flex justify-center">
        {{ $events->links() }}
    </div>
</div>