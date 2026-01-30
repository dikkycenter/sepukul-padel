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
        <a href="{{ route('leaderboard') }}" class="inline-flex items-center text-white border-white border hover:bg-white hover:text-[#2B82B9] focus:ring-4 focus:ring-[#2B82B9] shadow-xs font-medium leading-5 rounded-base text-base px-5 py-3 focus:outline-none">
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
            <a href="#" class="inline-flex items-center text-lg font-medium text-[#2B82B9] hover:underline pt-8">
            Lihat Lebih Banyak
            <svg class="w-5 h-5 ms-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
    </div>
</div>


