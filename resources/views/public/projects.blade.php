<section id="projects" class="section-shell border-y border-white/5 bg-white/[.02]">
<div class="mx-auto max-w-7xl px-5 sm:px-8"><div class="section-heading" data-reveal><div><p class="eyebrow">Selected work</p><h2>Karya yang menyelesaikan masalah nyata.</h2></div><p>Beberapa produk yang saya bangun dari perencanaan, pengembangan, hingga deployment.</p></div>
@if($projects->isEmpty())
<div class="mt-14 rounded-3xl border border-dashed border-white/15 bg-white/[.02] p-12 text-center"><i class="bi bi-folder2-open text-3xl text-cyan-300" aria-hidden="true"></i><h3 class="mt-4 text-xl font-semibold">Project segera hadir</h3><p class="mt-2 text-slate-400">Saya sedang menyiapkan studi kasus terbaik untuk ditampilkan.</p></div>
@else
<div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
@foreach ($projects as $project)
<article class="project-card group" data-reveal><a href="{{ route('projects.show', $project->slug) }}" class="block rounded-[1.45rem] focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300"><div class="relative aspect-[4/3] overflow-hidden bg-slate-900"><img src="{{ $project->thumbnail }}" alt="Tampilan project {{ $project->title }}" loading="lazy" class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105"><div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div><span class="absolute right-4 top-4 grid h-11 w-11 place-items-center rounded-full border border-white/15 bg-slate-950/70 text-white backdrop-blur transition group-hover:bg-cyan-300 group-hover:text-slate-950"><i class="bi bi-arrow-up-right" aria-hidden="true"></i></span></div><div class="p-6"><p class="eyebrow">{{ $project->category }}</p><h3 class="mt-2 text-xl font-semibold text-white">{{ $project->title }}</h3><p class="mt-3 line-clamp-2 text-sm leading-6 text-slate-400">{{ $project->description ?: 'Lihat detail proses, teknologi, dan hasil project ini.' }}</p></div></a></article>
@endforeach
</div>
@endif
</div></section>
