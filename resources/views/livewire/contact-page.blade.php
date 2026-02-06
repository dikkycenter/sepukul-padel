<div>
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
