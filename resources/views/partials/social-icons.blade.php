<div class="flex items-center gap-2" aria-label="Media sosial">
@foreach ([['https://wa.me/6287786799710','WhatsApp','bi-whatsapp'],['https://www.instagram.com/fadhillahdnrr','Instagram','bi-instagram'],['https://github.com/Fadhillahdnr','GitHub','bi-github'],['https://www.linkedin.com/in/muhamad-fadhillah-dinurahman-s-kom-a50b441ab','LinkedIn','bi-linkedin']] as [$url,$label,$icon])
<a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="Buka {{ $label }} Fadhillah" class="grid h-11 w-11 place-items-center rounded-xl border border-white/10 bg-white/5 text-lg text-slate-300 transition hover:-translate-y-0.5 hover:border-cyan-300/40 hover:bg-cyan-300/10 hover:text-cyan-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300"><i class="bi {{ $icon }}" aria-hidden="true"></i></a>
@endforeach
</div>
