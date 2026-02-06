<div class="bg-[#2B82B9]">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-96 overflow-hidden rounded-none md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('banner/banner1.webp') }}" class="absolute inset-0 w-full h-full object-cover object-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('banner/banner2.webp') }}" class="absolute inset-0 w-full h-full object-cover object-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('banner/banner3.jpeg') }}" class="absolute inset-0 w-full h-full object-cover object-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('banner/banner4.jpg') }}" class="absolute inset-0 w-full h-full object-cover object-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('banner/banner5.jpg') }}" class="absolute inset-0 w-full h-full object-cover object-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto" alt="...">
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

    {{-- Opening --}}
    <div class="p-12 text-center text-white">
        <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
            Sepukul Padel Club
        </h1>
        <p class="mb-4 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48">
            Satu pukulan, sejuta keseruan. Main padel bareng teman, tingkatkan skill,
            dan jadi bagian dari komunitas padel paling seru di kota.
        </p>
        <a href="{{ route('leaderboard-page') }}" class="inline-flex items-center text-white border-white border hover:bg-white hover:text-[#2B82B9] focus:ring-4 focus:ring-[#2B82B9] shadow-xs font-medium leading-5 rounded-base text-base px-5 py-3 focus:outline-none">
            Lihat Tabel Klasemen
        </a>        
    </div>
    {{-- Gallery --}}
    <div class="bg-white p-12 items-center bg-center">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_590384716_17864256636557844_5666822151134049850_n.jpg')}}" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_590392039_17864256564557844_8731243536903460920_n.jpg')}}" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_613000875_17864256501557844_770487371903491456_n.jpg')}}" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_613206508_17864256510557844_8762399443389330765_n.jpg')}}" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_615821820_17864256606557844_3923491323960658262_n.jpg')}}" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-base" src="{{ asset('gallery/instasave.website_615821820_17864256606557844_3923491323960658262_n.jpg')}}" alt="">
            </div>
                        
        </div>
        <div class="text-center">
            <a href="{{ route('gallery-page') }}" class="inline-flex items-center text-lg font-medium text-[#2B82B9] hover:underline pt-8">
            Lihat Lebih Banyak
            <svg class="w-5 h-5 ms-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
    </div>

    {{-- About us --}}
    <div class="p-12 bg-linear-to-b from-white from-50% to-[#2B82B9] to-50%">
        <div class="flex flex-col items-center text-center md:flex-row md:text-left md:items-center md:justify-between md:gap-12">

            <!-- Left Content -->
            <div class="md:w-3/5 md:-mt-40 md:pr-4 text-center md:text-right md:pl-8">
                <h1 class="mb-4 text-4xl font-regular tracking-tight text-slate-800 md:text-5xl md:whitespace-nowrap lg:text-6xl">
                    Ikuti <span class="font-extrabold bg-linear-to-r from-[#405DE6] via-[#C13584] to-[#FFDC80] inline-block text-transparent bg-clip-text">Instagram</span> Kami
                </h1>
                <p class="mb-2 text-lg font-normal text-slate-600 lg:text-xl sm:px-16 md:px-0">
                    Mari terhubung agar mendapatkan informasi terbaru dari kami.
                </p>

                <a
                    href="https://www.instagram.com/sepukulpadelclub/"
                    target="_blank"
                    rel="noopener noreferrer"
                    x-on:click.prevent="
                        if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
                            window.location.href = 'instagram://user?username=sepukulpadelclub';
                            setTimeout(() => {
                                window.location.href = 'https://www.instagram.com/sepukulpadelclub/';
                            }, 800);
                        } else {
                            window.open('https://www.instagram.com/sepukulpadelclub/', '_blank');
                        }
                    "
                    class="mb-6 inline-flex font-medium items-center text-[#2B82B9] hover:underline"
                >
                    Klik untuk mengikuti
                    <svg class="w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                    </svg>
                </a>
            </div>

            <!-- Right Mockup -->
            <div class="flex items-center justify-center md:w-2/5">
                <!-- iPhone 15 Container -->
                <div class="relative w-72 h-150 rounded-[45px] shadow-[0_0_2px_2px_rgba(255,255,255,0.1)] border-8 border-zinc-900">
                    <!-- Dynamic Island -->
                    <div class="absolute top-2 left-1/2 transform -translate-x-1/2 w-22.5 h-5.5 bg-zinc-900 rounded-full z-20"></div>

                    <div class="absolute -inset-px border-[3px] border-zinc-700 border-opacity-40 rounded-[37px] pointer-events-none"></div>

                    <!-- Screen Content -->
                    <div class="relative w-full h-full rounded-[37px] overflow-hidden flex items-center justify-center bg-zinc-900/10">
                        <img src="{{ asset('social-media/instagram-page.jpg') }}" class="w-full h-full object-cover" />
                    </div>

                    <!-- Left Side Buttons -->
                    <div class="absolute -left-3 top-20 w-1.5 h-8 bg-zinc-900 rounded-l-md shadow-md"></div>
                    <div class="absolute -left-3 top-36 w-1.5 h-12 bg-zinc-900 rounded-l-md shadow-md"></div>
                    <div class="absolute -left-3 top-52 w-1.5 h-12 bg-zinc-900 rounded-l-md shadow-md"></div>

                    <!-- Right Side Button -->
                    <div class="absolute -right-3 top-36 w-1.5 h-16 bg-zinc-900 rounded-r-md shadow-md"></div>
                </div>
            </div>

        </div>
    </div>
</div>


