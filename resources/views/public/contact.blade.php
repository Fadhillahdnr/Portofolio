{{-- ================= CONTACT ================= --}}
<section
    id="contact"
    class="scroll-mt-28 py-32
           bg-gradient-to-br from-indigo-600 via-indigo-500 to-purple-600
           relative overflow-hidden">

    {{-- subtle glow --}}
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.15),transparent_60%)]"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center text-white">

        {{-- Badge --}}
        <span
            class="inline-flex items-center gap-2 mb-6 px-5 py-2
                   rounded-full text-sm font-medium
                   bg-white/15 backdrop-blur-md">
            ✨ Let’s collaborate
        </span>

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">
            Tertarik Bekerja Sama?
        </h2>

        {{-- Description --}}
        <p class="mt-5 text-base md:text-lg text-white/90 max-w-2xl mx-auto">
            Saya terbuka untuk <span class="font-semibold">freelance</span>,
            <span class="font-semibold">kontrak</span>, maupun
            <span class="font-semibold">full-time</span>.
            Mari bangun solusi digital yang berdampak.
        </p>

        {{-- CTA --}}
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">

            <a href="mailto:m.fadhillah1218@gmail.com"
               class="inline-flex items-center justify-center gap-2
                      px-8 py-4 rounded-xl
                      bg-white text-indigo-600 font-semibold
                      shadow-xl shadow-black/20
                      hover:-translate-y-1 hover:shadow-2xl
                      transition-all duration-300">
                <i class="bi bi-envelope-fill"></i>
                Hubungi Saya
            </a>

            <a href="#projects"
               class="inline-flex items-center justify-center gap-2
                      px-8 py-4 rounded-xl
                      border border-white/40
                      text-white font-medium
                      hover:bg-white/10
                      transition">
                Lihat Project
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        {{-- Divider --}}
        <div class="mt-14 mb-10 flex items-center justify-center gap-4 opacity-60">
            <span class="h-px w-20 bg-white/40"></span>
            <span class="text-sm">atau temukan saya di</span>
            <span class="h-px w-20 bg-white/40"></span>
        </div>

        {{-- Social Icons --}}
        <div class="flex justify-center gap-4">
            <div
                class="p-4 rounded-2xl
                       bg-white/10 backdrop-blur-md
                       hover:bg-white/20
                       transition">
                @include('partials.social-icons')
            </div>
        </div>

    </div>
</section>
