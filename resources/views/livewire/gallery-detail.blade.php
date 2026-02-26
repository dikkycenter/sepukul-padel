<div>
    <section class="bg-neutral-primary">
        <div class="py-12 px-4 mx-auto max-w-4xl text-center">

            <h1 class="mb-4 text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-heading capitalize">
                {{ $galleries->title }}
            </h1>

            @if($galleries->description)
                <p class="mb-6 text-base md:text-lg text-body max-w-2xl mx-auto">
                    {{ $galleries->description }}
                </p>
            @endif

            @if($galleries->event_date)
                <div class="flex items-center justify-center gap-2 text-sm text-body/80">
                    
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
                        {{ $galleries->event_date->translatedFormat('d F Y') }}
                    </span>

                    <span class="text-xs text-body/50">
                        ({{ $galleries->event_date->diffForHumans() }})
                    </span>

                </div>
            @endif

        </div>
    </section>

    <div class="bg-white py-4 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 gap-6">

            @foreach ($galleries->image as $gallery)
                <div class="rounded-lg shadow-sm hover:shadow-md transition">
                    <img 
                        class="w-full h-full"
                        src="{{ asset('storage/'. $gallery) }}"
                        loading="lazy"
                        alt="">
                </div>
            @endforeach

        </div>
    </div>
</div>