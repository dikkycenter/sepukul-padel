<div class="py-8">
    <!-- Movement Ranking -->

    {{-- TAB GENDER --}}
    <div class="flex justify-center gap-6 mb-10">
        @foreach (['L' => 'MAN', 'P' => 'WOMAN'] as $key => $label)
            <button
                wire:click="setGender('{{ $key }}')"
                class="px-10 py-2 rounded-full font-extrabold transition
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
                <div class="text-[72px] md:text-[120px] font-black opacity-20 leading-none">
                    1
                </div>

                <h2 class="text-2xl md:text-5xl font-extrabold leading-tight text-center md:text-left">
                    {{ $rankOne[$activeSlide]->name }}
                </h2>

                <div class="flex flex-col md:flex-row items-center gap-3 md:gap-6 mt-4 md:mt-6">
                    <span class="bg-white text-[#1C3557] px-4 py-1 rounded font-bold">
                         <!-- Ranking Movement -->
                            {{ $rankOne[$activeSlide]->rank_mov }}
                        
                    </span>

                    <span class="text-xl">
                        Points <b>{{ $rankOne[$activeSlide]->point }}</b>
                    </span>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <div class="">
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode($rankOne[$activeSlide]->name) }}&size=400&background=ffffff&color=1C3557"
                    class="h-68 object-contain drop-shadow-xl rounded-full items-end"
                />
            </div>
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
                <span class="font-extrabold w-8">{{ $player->rank_mov }} </span>
                 
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

</div>