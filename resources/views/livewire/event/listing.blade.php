<?php

use function Livewire\Volt\{state};


?>

<section class="bg-[#F6E69E] py-20 px-6">
    <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-black tracking-tighter italic">
            <span class="text-[#0D5F77]">OUR</span> 
            <span class="text-white drop-shadow-[2px_2px_0px_#0D5F77]" style="-webkit-text-stroke: 1.5px #0D5F77;">EVENTS</span>
        </h2>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach($others as $other)
            {{-- Tambahkan class 'relative' agar overlay link bisa menempel sempurna --}}
            <div class="relative bg-[#FFF9F0] rounded-[1.5rem] shadow-xl overflow-hidden flex flex-col border border-white/50 transition-transform hover:scale-[1.02] duration-300">
                
                {{-- Link Transparan yang menutupi seluruh area card --}}
                <a href="{{ route('event.show', $other['id']) }}" class="absolute inset-0 z-20" aria-label="Daftar ke {{ $other['nama_event'] }}"></a>

                <div class="p-5 pb-0">
                    <div class="bg-[#0D5F77] rounded-t-[2rem] p-4 aspect-video flex items-center justify-center relative overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/default-run-pict.png') }}" alt="Track" class="w-full h-full object-contain scale-110">
                    </div>
                    
                    <div class="bg-[#FDBF2D] relative z-10 rounded-b-xl p-3 flex items-center gap-3 shadow-md border border-black/5">
                        <div class="text-[#0D5F77]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-[#0D5F77]/60 uppercase leading-none">{{ $other['subLokasi'] }}</span>
                            <span class="text-xs font-black text-[#0D5F77] leading-tight">{{ $other['lokasi'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-lg font-black text-[#0D5F77] leading-tight">
                            {{ $other['nama_event'] }}
                        </h3>
                        <span class="text-xs font-black text-[#0D5F77] whitespace-nowrap">{{ $other['tanggal'] }}</span>
                    </div>

                    <p class="text-[#0D5F77]/80 text-xs font-bold leading-relaxed">
                        {{ $other['deskripsi'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>