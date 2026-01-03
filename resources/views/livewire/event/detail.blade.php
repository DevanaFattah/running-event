<?php

use function Livewire\Volt\{state};

// state([
//     'title' => 'TAHUN BARU(A)N',
//     'date' => '13 Desember 2026',
//     'price' => 'Rp 0,- (Free)',
//     'location' => 'WeatherTech Raceway Laguna Seca',
//     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam. Fusce ut commodo est, vel feugiat ante. Suspendisse viverra elit nec lacus vestibulum vehicula.'
// ]);

?>

<section class="bg-[#F6E69E] min-h-screen py-12 px-4 md:px-0">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8 items-start">
        
        
        <div class="w-full md:w-2/3 bg-[#FFF9F0] rounded-[1rem] p-8 md:p-10 shadow-xl">
            <div class="flex flex-col md:flex-row gap-8 border-b-4 border-[#0D5F77] pb-8 mb-8">
                <div class="w-full md:w-1/2">
                    <div class="bg-[#0D5F77] rounded-t-3xl p-4 aspect-video flex items-center justify-center relative">
                        <img src="{{ Vite::asset('resources/images/default-run-pict.png') }}" class="w-full h-full object-contain scale-110">
                        <div class="absolute -bottom-5 left-4 right-4 bg-[#FDBF2D] rounded-b-xl p-2 flex items-center gap-2 -mx-4 border border-black/10">
                            <flux:icon.map-pin variant="mini" class="text-[#0D5F77]" />
                            <span class="text-[10px] font-black text-[#0D5F77] uppercase leading-none">{{ $event->lokasi }}</span>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 space-y-2">
                    <h2 class="text-3xl font-black text-[#0D5F77] leading-tight uppercase">
                        {{ $event->nama_event }}  
                    </h2>
                    <div class="space-y-1 text-xs font-bold text-[#0D5F77]">
                        <div class="flex justify-between border-b border-[#0D5F77]/10 pb-1">
                            <span class="opacity-80 uppercase tracking-widest">Tanggal</span>
                            <span> {{ $event->tanggal }} </span>
                        </div>
                        <div class="flex justify-between border-b border-[#0D5F77]/10 pb-1">
                            <span class="opacity-80 uppercase tracking-widest">Start</span>
                            <span>{{ $event->start }} </span>
                        </div>
                        <div class="flex justify-between border-b border-[#0D5F77]/10 pb-1">
                            <span class="opacity-80 uppercase tracking-widest">Flag-off</span>
                            <span>{{ $event->flag_off }}</span>
                        </div>
                        <div class="flex justify-between border-b border-[#0D5F77]/10 pb-1">
                            <span class="opacity-80 uppercase tracking-widest">Distance</span>
                            <span>{{ $event->kategori }}</span>
                        </div>
                        {{-- <div class="flex justify-between border-b border-[#0D5F77]/10 pb-1">
                            <span class="opacity-80 uppercase tracking-widest">Elevation</span>
                            <span>70 M</span>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-2xl font-black text-[#0D5F77] uppercase tracking-tighter">
                    {{ $event->nama_event }} 
                    {{-- <span class="text-[#FDBF2D]">TAHUN BARU(A)N</span> --}}
                </h3>
                <div class="text-[#0D5F77] font-medium leading-relaxed space-y-4">
                    <p>{{ $event->deskripsi }}</p>
                    <p>{{ $event->deskripsi }}</p>
                    <p>{{ $event->deskripsi }}</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/3 space-y-6">
            <div class="bg-[#FFF9F0] rounded-[1rem] p-8 shadow-xl space-y-8">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-[#0D5F77] p-2 rounded-lg text-white">
                            <flux:icon.map-pin class="w-5 h-5" />
                        </div>
                        <span class="text-sm font-bold text-[#0D5F77] leading-tight">{{ $event->lokasi }}</span>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-[#0D5F77] p-2 rounded-lg text-white">
                            <flux:icon.calendar class="w-5 h-5" />
                        </div>
                        <span class="text-sm font-bold text-[#0D5F77]">{{ $event->tanggal }}</span>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-[#0D5F77] p-2 rounded-lg text-white">
                            <flux:icon.ticket class="w-5 h-5" />
                        </div>
                        <span class="text-sm font-bold text-[#0D5F77]">{{ $event->kategori }}</span>
                    </div>
                </div>

                <a href="{{ route('event.registForm', $event->id) }}" class="p-6 w-full bg-[#FDBF2D] hover:bg-[#eab028] text-[#0D5F77] font-black py-4 rounded-2xl shadow-md uppercase tracking-widest text-sm transition-all active:scale-95">
                    Melu Playon!
                </a>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif      

    </div>
</section>