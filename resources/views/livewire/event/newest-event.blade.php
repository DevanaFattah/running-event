<?php

use function Livewire\Volt\{state};

state([
    'event' => [
        'title' => 'TAHUN BARU(A)N',
        'date' => '13 DESEMBER 2026',
        'start' => '06:00 WIB',
        'flag_off' => '07:00 WIB',
        'distance' => '5 KM',
        'elevation' => '70 M',
        'location_name' => 'WeatherTech Raceway',
        'location_sub' => 'Laguna Seca'
    ]
]);

?>

<section class="relative w-full bg-[#F6E69E] py-16 overflow-hidden">
    <div class="text-center mb-10">
        <h2 class="text-4xl md:text-5xl font-black tracking-tighter italic">
            <span class="text-[#0D5F77]">PLAYON</span> 
            <span class="text-white drop-shadow-[2px_2px_0px_#0D5F77] stroke-black" style="-webkit-text-stroke: 1.5px #0D5F77;">SAIKI!</span>
        </h2>
    </div>

    <div class="absolute top-1/3 left-0 w-full h-20 -translate-y-1/2 flex z-0">
        {{-- @foreach(range(1, 40) as $i)
            <div class="h-full w-10 shrink-0 {{ $i % 2 == 0 ? 'bg-black' : 'bg-white' }}"></div>
        @endforeach --}}
        <img src="{{ Vite::asset('resources/images/Vector.svg') }}" alt="Track Map" class="">
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <div class="bg-[#FFF9F0] rounded-[2.5rem] shadow-xl p-6 md:p-8 flex flex-col md:flex-row gap-8 items-center border border-white/50">
            
            <div class="w-full md:w-1/2">
                <div class="bg-[#0D5F77] rounded-t-3xl p-4 aspect-[4/3] flex items-center justify-center relative overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/default-run-pict.png') }}" alt="Track Map" class="w-full h-full object-contain scale-110">
                </div>
                
                <div class="bg-[#FDBF2D] rounded-b-2xl p-4 flex items-center gap-4 shadow-sm border border-black/5">
                    <div class="text-[#0D5F77]">
                        <flux:icon.map-pin variant="solid" class="w-8 h-8" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-[#0D5F77]/60 uppercase leading-none">{{ $event['location_name'] }}</span>
                        <span class="text-lg font-black text-[#0D5F77] leading-tight">{{ $event['location_sub'] }}</span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 space-y-6">
                <h3 class="text-3xl md:text-4xl font-black text-[#0D5F77] leading-none">
                    TAHUN <span class="text-[#FDBF2D]">BARU(A)N</span>
                </h3>

                <div class="space-y-2">
                    @php
                        $details = [
                            'Tanggal' => $event['date'],
                            'Start' => $event['start'],
                            'Flag-off' => $event['flag_off'],
                            'Distance' => $event['distance'],
                            'Elevation' => $event['elevation'],
                        ];
                    @endphp

                    @foreach($details as $label => $value)
                    <div class="flex justify-between items-end gap-2 border-b border-[#0D5F77]/10 pb-1">
                        <span class="text-xs font-extrabold text-[#0D5F77]/40 uppercase tracking-widest">{{ $label }}</span>
                        <span class="text-sm font-black text-[#0D5F77]">{{ $value }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="pt-4">
                    <button class="w-full md:w-auto bg-[#FDBF2D] hover:bg-[#eab028] text-[#0D5F77] font-black py-4 px-10 rounded-2xl shadow-md transition-all active:scale-95 uppercase text-sm tracking-widest border-b-4 border-black/10">
                        Melu Playon!
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>