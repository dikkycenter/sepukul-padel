<div class="py-8">
    <!-- Movement Ranking -->

    {{-- TAB GENDER --}}
    <div class="flex justify-center gap-6 mb-10">
        @foreach (['L' => 'MAN', 'P' => 'WOMAN'] as $key => $label)
            <button
                wire:click="setGender('{{ $key }}')"
                class="px-10 py-2 rounded-base font-extrabold transition
                {{ $gender === $key
                    ? 'bg-white text-[#1C3557]'
                    : 'bg-[#1C3557]/70 hover:bg-[#1C3557]' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    @php
        $rankOne = $players->where('rank', 1)->values();
        $others  = $players->filter(fn ($p) => $p->rank > 1);
    @endphp

    {{-- 🔥 TRIGGER AUTO SLIDE (OPS I 2) --}}
    @if ($rankOne->count() > 1)
        <div wire:init="startAutoSlide({{ $rankOne->count() }})"></div>
    @endif

    {{-- RANK #1 SLIDER --}}
    @if ($rankOne->count())
    <div class="relative max-w-6xl mx-auto mb-16">

        <div class="bg-[#2B82B9] rounded-3xl p-6 md:p-12 shadow-2xl
            flex flex-col-reverse md:flex-row
            items-center md:items-end
            gap-6 md:gap-0">

            {{-- LEFT --}}
            <div>
                <div class="text-[72px] flex flex-wrap md:text-[120px] font-black opacity-75 leading-none">
                    1
                    @if($rankOne[$activeSlide]->rank_mov !== 'none' && str_starts_with($rankOne[$activeSlide]->rank_mov, '+'))
                    <span class="text-green-600 px-6 py-1 rounded font-bold text-xl">
                        ▲  {{ ltrim($rankOne[$activeSlide]->rank_mov, '+') }}
                    </span>

                @elseif($rankOne[$activeSlide]->rank_mov !== 'none' && str_starts_with($rankOne[$activeSlide]->rank_mov, '-'))
                    <span class="text-red-600 px-4 py-1 rounded font-bold text-xl">
                        ▼  {{ ltrim($rankOne[$activeSlide]->rank_mov, '-') }}
                    </span>

                @endif

                    <h1 class="text-5xl md:text-5xl font-extrabold leading-tight text-center md:text-left">
                        {{ $rankOne[$activeSlide]->name }}
                    </h1>

                </div>

                <!-- <h2 class="text-2xl md:text-5xl font-extrabold leading-tight text-center md:text-left">
                    {{ $rankOne[$activeSlide]->name }}
                </h2> -->

                <div class="flex flex-col md:flex-row items-center gap-3 md:gap-6 mt-4 md:mt-6">
                    <span class="text-xl">
                        Points <b>{{ $rankOne[$activeSlide]->point }}</b>
                    </span>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($rankOne[$activeSlide]->name) }}&size=400&background=ffffff&color=1C3557"
                class="h-68 object-contain drop-shadow-xl rounded-full ms-auto mx-8"
            />
        </div>

        

        {{-- NAV BUTTON --}}
        @if ($rankOne->count() > 1)
            <button
                wire:click="prevSlide({{ $rankOne->count() }})"
                class="absolute left-2 md:left-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-4 md:px-6
                    opacity-80 hover:opacity-100">
                ‹
            </button>

            <button
                wire:click="nextSlide({{ $rankOne->count() }})"
                class="absolute right-2 md:rigth-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-4 md:px-6
                    opacity-80 hover:opacity-100">
                ›
            </button>
        @endif
    </div>
    @endif

    {{-- RANK #1 SLIDER --}}
    @if ($rankOne->count())
    <div class="relative max-w-6xl mx-auto mb-16">

        <div class="bg-[#2B82B9] rounded-3xl p-6 md:p-12 shadow-2xl
            flex flex-col-reverse md:flex-row
            items-center md:items-end
            gap-6 md:gap-0">

            {{-- LEFT --}}
            <div class="flex flex-col justify-between md:p-4 leading-normal">
                 <h1 class="mb-2 text-10xl font-bold tracking-tight text-heading">1</h1>
                 <p class="mb-6 text-body">In today’s fast-paced digital landscape, fostering seamless collaboration among Developers and IT Operations.</p>
        
                <div class="text-[72px] flex flex-col justify-between md:text-[120px] font-black opacity-75 leading-none">
                    1
                    @if($rankOne[$activeSlide]->rank_mov !== 'none' && str_starts_with($rankOne[$activeSlide]->rank_mov, '+'))
                    <span class="text-green-600 px-6 py-1 rounded font-bold text-xl">
                        ▲  {{ ltrim($rankOne[$activeSlide]->rank_mov, '+') }}
                    </span>

                @elseif($rankOne[$activeSlide]->rank_mov !== 'none' && str_starts_with($rankOne[$activeSlide]->rank_mov, '-'))
                    <span class="text-red-600 px-4 py-1 rounded font-bold text-xl">
                        ▼  {{ ltrim($rankOne[$activeSlide]->rank_mov, '-') }}
                    </span>

                @endif

                    <h1 class="text-5xl md:text-5xl font-extrabold leading-tight text-center md:text-left">
                        {{ $rankOne[$activeSlide]->name }}
                    </h1>

                </div>

                <!-- <h2 class="text-2xl md:text-5xl font-extrabold leading-tight text-center md:text-left">
                    {{ $rankOne[$activeSlide]->name }}
                </h2> -->

                <div class="flex flex-col md:flex-row items-center gap-3 md:gap-6 mt-4 md:mt-6">
                    <span class="text-xl">
                        Points <b>{{ $rankOne[$activeSlide]->point }}</b>
                    </span>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($rankOne[$activeSlide]->name) }}&size=400&background=ffffff&color=1C3557"
                class="h-68 object-contain drop-shadow-xl rounded-full ms-auto mx-8"
            />
        </div>

        

        {{-- NAV BUTTON --}}
        @if ($rankOne->count() > 1)
            <button
                wire:click="prevSlide({{ $rankOne->count() }})"
                class="absolute left-2 md:left-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-4 md:px-6
                    opacity-80 hover:opacity-100">
                ‹
            </button>

            <button
                wire:click="nextSlide({{ $rankOne->count() }})"
                class="absolute right-2 md:rigth-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-4 md:px-6
                    opacity-80 hover:opacity-100">
                ›
            </button>
        @endif
    </div>
    @endif

    {{-- RANK 2+ --}}
    <div class="max-w-3xl mx-auto space-y-3 px-4 md:px-0">
        @foreach ($others as $player)
        <div class="flex justify-between items-center bg-[#1C3557]
            rounded-xl px-4 md:px-6 py-3 md:py-4">
            <div class="flex items-center gap-4">
                <span class="font-extrabold w-8">#{{ $player->rank }}</span>
                    @if($player->rank_mov !== 'none' && str_starts_with($player->rank_mov, '+'))
                    <span class="text-green-600 px-4 py-1 rounded font-bold">
                        ▲  {{ ltrim($player->rank_mov, '+') }}
                    </span>

                @elseif($player->rank_mov !== 'none' && str_starts_with($player->rank_mov, '-'))
                    <span class="text-red-600 px-4 py-1 rounded font-bold">
                        ▼  {{ ltrim($player->rank_mov, '-') }}
                    </span>

                @else
                    <span class="text-white px-4 py-1 rounded font-bold">–</span>
                @endif
                 
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode($rankOne[$activeSlide]->name) }}&size=400&background=ffffff&color=1C3557"
                    class="h-10 object-contain drop-shadow-xl rounded-full"
                />
                <span class="font-medium text-lg">{{ $player->name }}</span>
            </div>
            <span class="font-bold text-lg">{{ $player->point }} pts</span>
        </div>
        @endforeach
    </div>

    

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-base md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://sl.bing.net/fl2a4y5a4Z2" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-base" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-base" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


</div>




