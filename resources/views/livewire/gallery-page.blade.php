<div>
    <div class="bg-white py-12 px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($galleries as $gallery)
                <div class="bg-white rounded-xl border border-default shadow-sm hover:shadow-md transition duration-300 flex flex-col overflow-hidden">

                    {{-- Thumbnail --}}
                    <a href="{{ route('gallery.detail', $gallery->slug) }}" class="block h-60 overflow-hidden">
                        <img 
                            class="w-full h-full object-cover hover:scale-105 transition duration-500"
                            src="{{ asset('storage/' . $gallery->thumbnail) }}"
                            loading="lazy"
                            alt="{{ $gallery->title }}"
                        />
                    </a>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col flex-1">

                        {{-- Title --}}
                        <a href="{{ route('gallery.detail', $gallery->slug) }}">
                            <h3 class="text-xl font-semibold text-heading mb-2 capitalize hover:text-neutral-700 transition">
                                {{ $gallery->title }}
                            </h3>
                        </a>

                        {{-- Event Date --}}
                        @if($gallery->event_date)
                            <div class="flex items-center gap-2 text-sm text-body/70 mb-4">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-4 h-4 shrink-0 opacity-70">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                <span>
                                    {{ $gallery->event_date->translatedFormat('d F Y') }}
                                </span>

                                <span class="text-xs text-body/50">
                                    ({{ $gallery->event_date->diffForHumans() }})
                                </span>
                            </div>
                        @endif

                        {{-- Description --}}
                        <p class="text-body text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ $gallery->description }}
                        </p>

                        {{-- Button --}}
                        <div class="mt-auto">
                            <a href="{{ route('gallery.detail', $gallery->slug) }}"
                               class="inline-flex items-center gap-2 text-sm font-medium text-body bg-neutral-secondary-medium border border-default-medium rounded-base px-4 py-2.5 hover:bg-neutral-tertiary-medium hover:text-heading transition">
                                Lihat Selengkapnya

                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-8 flex justify-center">
        {{ $galleries->links() }}
    </div>
</div>