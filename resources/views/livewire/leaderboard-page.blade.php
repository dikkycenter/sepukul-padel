<div class="py-8">
    <!-- Movement Ranking -->

    {{-- TAB GENDER --}}
    <div class="flex justify-center gap-0 mb-10">
        @foreach (['L' => 'Man', 'P' => 'Woman'] as $key => $label)
            <button
                wire:click="setGender('{{ $key }}')"
                class="px-10 py-2 rounded-none font-bold text-sm transition
                {{ $gender === $key
                    ? 'bg-[#2B82B9]/70 text-white border-b-2 border-[#2B82B9]/70'
                    : 'text-[#2B82B9]/70 border-b-2 hover:bg-[#2B82B9] hover:border-[#2B82B9]/70 hover:text-white' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    @php
        $bestPlayer = $players->whereBetween('rank', [1,10])->values();
        $playerActive = $bestPlayer->get($activeSlide);
        $others  = $players->filter(fn ($p) => $p->rank > 1);
    @endphp


    {{-- RANK #1 SLIDER --}}
    @if ($bestPlayer->count())
    <div class="relative max-w-6xl mx-auto mb-16"
        x-data="{
            interval: null,
            start() {
                this.interval = setInterval(() => {
                    $wire.nextSlide({{ $bestPlayer->count() }})
                }, 5000)
            },
            stop() {
                clearInterval(this.interval)
            }
        }"
        x-init="start()"
        @mouseenter="stop()"
        @mouseleave="start()"
    >

        <div class="bg-linear-to-tr from-[#2B82B9] via-[#3ca1cc] to-[#57C5C7] rounded-3xl mx-9 px-6 py-0 md:px-12 shadow-2xl
            flex flex-col-reverse md:flex-row
            items-center md:items-end
            gap-6 md:gap-0">

            {{-- LEFT --}}
            <div>
                <div class="text-[40px] flex flex-wrap my-1.5 md:text-[120px] font-black leading-none md:leading-1">
                    <span class="opacity-75">{{$playerActive?->rank}}</span>
                @if($playerActive && $playerActive->rank_mov !== 'none' && str_starts_with($playerActive->rank_mov, '+'))
                    <span class="text-green-400 pl-2 mb-10 rounded font-bold text-[11px]">
                        ▲ {{ ltrim($playerActive->rank_mov, '+') }}
                    </span>

                @elseif($playerActive && $playerActive->rank_mov !== 'none' && str_starts_with($playerActive->rank_mov, '-'))
                    <span class="text-red-600 pl-2 mb-10 rounded font-bold text-[11px]">
                        ▼ {{ ltrim($playerActive->rank_mov, '-') }}
                    </span>

                @endif

                    <h1 class="text-2xl mx-4 md:text-5xl font-extrabold leading-2 md:leading-tight text-center md:text-left capitalize">
                        {{ $playerActive?->name }}
                    </h1>
                </div>

                <div class="flex flex-col md:flex-row items-center gap-3 md:gap-6 mt-4 md:mt-6">
                    <span class="text-xl py-4 md:py-0 md:mb-5">
                        Points <b>{{ $playerActive?->point }}</b>
                    </span>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <img
                src="{{ 
                    $playerActive && $playerActive->avatar
                        ? asset('storage/' . $playerActive->avatar)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($playerActive?->name ?? 'Player') . '&size=400&background=ffffff&color=1C3557&border-radius=50%'
                }}"
                class="w-full border-b-0 border-b-sky-800 h-68 object-contain md:border-0 md:max-w-1/3 md:ms-auto md:mx-8 lg:ms-auto lg:mx-8"
            />
        </div>

        

        {{-- NAV BUTTON --}}
        @if ($bestPlayer->count() > 1)
            <button
                wire:click="prevSlide({{ $bestPlayer->count() }})"
                class="absolute left-2 md:left-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-12 md:px-12
                    opacity-80 hover:opacity-100">
                ‹
            </button>

            <button
                wire:click="nextSlide({{ $bestPlayer->count() }})"
                class="absolute right-2 md:rigth-0 top-1/2 -translate-y-1/2
                    text-4xl md:text-5xl px-12 md:px-12
                    opacity-80 hover:opacity-100">
                ›
            </button>
        @endif
    </div>
    @endif  

    {{-- RANK 2+ --}}
    <div class="bg-gray-100 p-10">
        <div class="max-w-3xl mx-auto space-y-1 px-4 md:px-0">
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
                        src="{{ asset('storage/' . $player->avatar) }}"
                        onerror="this.src=`https://ui-avatars.com/api/?name={{ urlencode($player->name) }}&size=400&background=ffffff&color=1C3557`;"
                        class="h-10 object-contain drop-shadow-xl rounded-full bg-amber-50"
                    />
                    <span class="font-medium text-lg">{{ $player->name }}</span>
                </div>
                <span class="font-bold text-lg">{{ $player->point }} pts</span>
            </div>
            @endforeach
        </div>
    </div>
</div>