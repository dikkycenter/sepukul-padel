<div class="py-8">
    <!-- Movement Ranking -->
    @if ($bestPlayer->count())
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
        $playerActive = $bestPlayer->get($activeSlide);
    @endphp


    {{-- RANK #1 SLIDER --}}
    
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

        <div class="bg-linear-to-tr from-[#2B82B9] via-[#3ca1cc] to-[#57C5C7] rounded-3xl mx-9 px-6 py-0 md:px-12 md:pt-4 shadow-2xl
            flex flex-col-reverse md:flex-row
            items-center md:items-end
            gap-6 md:gap-0">

            {{-- LEFT --}}
            <div>
                <div class="text-8xl flex flex-wrap my-1.5 md:text-[120px] font-black leading-none md:leading-1">
                    <span class="opacity-55 absolute top-18 left-18 md:top-22 md:left-25">{{$playerActive?->rank}}</span>
                

                    <h1 class="text-4xl mx-0 md:mx-4 md:text-5xl font-extrabold leading-auto text-center md:text-left capitalize">
                        {{ $playerActive?->player?->name }}
                    </h1>
                </div>

                <div class="items-center py-4 mt-8 mb-2 md:mt-4 md:ml-4 text-center md:text-left">
                    <!-- Label -->
                    <span class="text-xl py-1 px-2.5 md:py-2 md:px-8 font-medium bg-[#2B82B9] border">
                        Points
                    </span>

                    <!-- Value -->
                    <span class="text-xl py-1 px-4 md:py-2 md:px-8 font-extrabold bg-[#2B82B9] border border-l-0">
                        {{ $playerActive?->point }}

                        <!-- Movement -->
                         @if($playerActive && $playerActive->rank_mov !== 'none' && str_starts_with($playerActive->rank_mov, '+'))
                            <span class="text-green-400 font-bold text-[11px] align-middle">
                                ▲ {{ ltrim($playerActive->rank_mov, '+') }}
                            </span>

                        @elseif($playerActive && $playerActive->rank_mov !== 'none' && str_starts_with($playerActive->rank_mov, '-'))
                            <span class="text-red-600 font-bold text-[11px] align-middle">
                                ▼ {{ ltrim($playerActive->rank_mov, '-') }}
                            </span>
                        @else
                        <span class="text-white w-auto text-center inline-block font-bold">–</span>
                        
                        @endif
                    </span>

                    
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <img
                src="{{ 
                    $playerActive && $playerActive->player->avatar
                        ? asset('storage/' . $playerActive->player?->avatar)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($playerActive?->player?->name ?? 'Player') . '&size=400&background=ffffff&color=1C3557&border-radius=50%'
                }}"
                class="relative z-10 w-full h-68 object-contain md:max-w-1/3 md:ms-auto md:mx-8 lg:ms-auto lg:mx-8"
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
    <div class="bg-gray-100 pt-8 px-2.5">
        <div class="max-w-3xl mx-auto space-y-1 px-4 md:px-0">
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                x-data
                autofocus
                placeholder="Cari nama pemain..."
                class="text-body/75 placeholder:text-body/55 px-5 py-2 bg-neutral-50 mb-6 w-full md:w-1/3 rounded-base border border-gray-300 
               focus:outline-none focus:ring-2 focus:ring-[#1C3557]
               shadow-sm"
            >
            @if($others->count())
            @foreach ($others as $player)
            <div class="flex justify-between items-center bg-[#1C3557]
                rounded-xl px-4 md:px-6 py-3 md:py-4">
                <div class="flex items-center gap-3">
                    <span class="font-bold w-8">#{{ $player->rank }}</span>
                        @if($player->rank_mov !== 'none' && str_starts_with($player->rank_mov, '+'))
                        <span class="text-green-600 w-8 md:w-12 text-center inline-block font-bold">
                            ▲  {{ ltrim($player->rank_mov, '+') }}
                        </span>

                    @elseif($player->rank_mov !== 'none' && str_starts_with($player->rank_mov, '-'))
                        <span class="text-red-600 w-8 md:w-12 text-center inline-block font-bold">
                            ▼  {{ ltrim($player->rank_mov, '-') }}
                        </span>

                    @else
                        <span class="text-white w-8 md:w-12 text-center inline-block font-bold">–</span>
                    @endif
                    <div class="h-10 w-10 rounded-full overflow-hidden bg-amber-50 drop-shadow-xl">
                        <img
                            src="{{ asset('storage/' . $player->player?->avatar) }}"
                            onerror="this.src=`https://ui-avatars.com/api/?name={{ urlencode($player->player?->name) }}&size=400&background=ffffff&color=1C3557`;"
                            class="h-full w-full object-cover object-top"
                        />
                    </div>
                    <span class="font-normal text-lg leading-5 md:text-lg md:font-bold">{{ $player->player?->name }}</span>
                </div>
                <span class="font-bold text-lg md:text-2xl">{{ $player->point }} <a class="font-light text-xs">pts</a></span>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="py-8 flex justify-center-safe">
            {{ $others->links() }}
        </div>
        @else
        <div class="text-center py-12 text-gray-500 font-semibold">
        Tidak ditemukan
        </div>
        @endif
    </div>
    
    </div>

    
</div>