<div class="bg-neutral-50 min-h-screen">

    <div class="max-w-6xl mx-auto px-8 py-10">

        {{-- TITLE --}}
        <div class="mb-6">
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold uppercase tracking-tight text-heading leading-tight">
                {{ $events->title }}
            </h1>

            @if($events->event_date)
                <div class="mt-3 flex items-center gap-2 text-sm text-body/70">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 0 1 5.25 6h13.5A2.25 2.25 0 0 1 21 8.25v10.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75Z" />
                    </svg>

                    <span>
                        {{ $events->event_date->translatedFormat('d F Y') }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 shrink-0 opacity-70 ml-2.5">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-xs text-body/50">
                        {{ $events->event_date->diffForHumans() }}
                    </span>
                </div>
            @endif
        </div>


        {{-- FEATURE IMAGE --}}
        <div class="mb-2">
            <div class="rounded-xl shadow-md">
                <img 
                    src="{{ asset('storage/'. $events->image ) }}"
                    alt="{{ $events->title }}"
                    class="w-full h-full rounded-base"
                    loading="lazy"
                >
            </div>
        </div>


        {{-- ACTION BAR --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-t border-b py-6">

            {{-- DOWNLOAD BUTTON --}}
            <div>
                <a href="{{ asset('storage/'. $events->image ) }}"
                   download
                   class="inline-flex items-center gap-2 bg-primary text-body px-5 py-4 rounded-base text-sm font-semibold hover:shadow-xs hover:bg-primary/90 transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M7.5 10.5 12 15m0 0 4.5-4.5M12 15V3" />
                    </svg>

                    Download Image
                </a>
            </div>


            {{-- SHARE SECTION --}}
            <div x-data="{ copied: false }" class="flex items-center gap-4 flex-wrap">

                <span class="text-sm font-semibold text-body/70 capitalized tracking-wide">
                    Share Now :
                </span>

                <div class="flex items-center gap-3">

                    {{-- FACEBOOK --}}
                    <button onclick="shareFacebook()"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-600 hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" class="w-4 h-4">
                            <path d="M22 12a10 10 0 1 0-11.5 9.9v-7H7.9V12h2.6V9.8c0-2.6 1.5-4 3.8-4 1.1 0 2.3.2 2.3.2v2.5h-1.3c-1.3 0-1.7.8-1.7 1.6V12h2.9l-.5 2.9h-2.4v7A10 10 0 0 0 22 12z"/>
                        </svg>
                    </button>


                    {{-- X --}}
                    <button onclick="shareX()"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-black hover:scale-110 transition">
                        <svg viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                            <path d="M18.9 2H22l-6.7 7.6L23 22h-6.8l-5.3-7-6.1 7H1.7l7.2-8.2L1 2h7l4.8 6.3L18.9 2z"/>
                        </svg>
                    </button>

                    {{-- INSTAGRAM STORY --}}
                    <button
                        onclick="shareInstagram()"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-linear-to-tr from-pink-500 via-red-500 to-yellow-500 hover:scale-110 transition">
                        <svg viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                            <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5.8A4.2 4.2 0 1 1 7.8 12 4.2 4.2 0 0 1 12 7.8zm5.2-.9a1 1 0 1 1-1-1 1 1 0 0 1 1 1z"/>
                        </svg>
                    </button>

                    {{-- TIKTOK --}}
                    <button
                        onclick="shareTikTok()"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-black hover:scale-110 transition">
                        <svg viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                            <path d="M16 3a5 5 0 0 0 5 5v3a8 8 0 0 1-5-1.6V16a6 6 0 1 1-6-6h1v3h-1a3 3 0 1 0 3 3V3h3z"/>
                        </svg>
                    </button>

                    {{-- COPY LINK --}}
                    <button
                        @click="
                            navigator.clipboard.writeText('{{ url()->current() }}');
                            copied = true;
                            setTimeout(() => copied = false, 2000);
                        "
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-600 hover:scale-110 transition">
                        <svg viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                            <path d="M16 1H4a2 2 0 0 0-2 2v12h2V3h12V1zm4 4H8a2 2 0 0 0-2 2v14h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z"/>
                        </svg>
                    </button>

                </div>

                <span x-show="copied" x-transition class="text-xs text-green-600 font-medium">
                    Link copied!
                </span>

            </div>

        </div>


        {{-- DESCRIPTION --}}
        @if($events->description)
            <div class="mt-2 prose prose-neutral max-w-none text-body leading-relaxed">
                {!! nl2br(e($events->description)) !!}
            </div>
        @endif

    </div>

    {{-- Share Fitur --}}
    <script>
    const shareData = {
        title: "{{ $events->title }}",
        text: "Check this event:",
        url: "{{ url()->current() }}"
    };

    // Universal Native Share (Android / iOS modern)
    async function nativeShare() {
        if (navigator.share) {
            try {
                await navigator.share(shareData);
                return true;
            } catch (err) {
                return false;
            }
        }
        return false;
    }

    // FACEBOOK
    async function shareFacebook() {

        if (await nativeShare()) return;

        const appLink = `fb://facewebmodal/f?href=https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareData.url)}`;
        const webLink = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareData.url)}`;

        window.location.href = appLink;

        setTimeout(() => {
            window.location.href = webLink;
        }, 1500);
    }


    // X (Twitter)
    async function shareX() {

        if (await nativeShare()) return;

        const text = encodeURIComponent(shareData.title);
        const url = encodeURIComponent(shareData.url);

        const appLink = `twitter://post?message=${text}%20${url}`;
        const webLink = `https://twitter.com/intent/tweet?text=${text}&url=${url}`;

        window.location.href = appLink;

        setTimeout(() => {
            window.location.href = webLink;
        }, 1500);
    }


    // INSTAGRAM
    function shareInstagram() {

        const appLink = `instagram://story-camera`;
        const fallback = "https://www.instagram.com/";

        window.location.href = appLink;

        setTimeout(() => {
            window.location.href = fallback;
        }, 1500);
    }


    // TIKTOK
    function shareTikTok() {

        const appLink = `tiktok://`;
        const fallback = "https://www.tiktok.com/";

        window.location.href = appLink;

        setTimeout(() => {
            window.location.href = fallback;
        }, 1500);
    }
    </script>
</div>