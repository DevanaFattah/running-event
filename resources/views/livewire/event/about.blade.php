<?php

use function Livewire\Volt\{state};

state([
    'title' => 'LOREM IPSUM',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet, erat quis tristique egestas, arcu libero fringilla dui, id viverra lectus sem id diam. Fusce ut commodo est, vel feugiat ante. Suspendisse viverra elit nec lacus vestibulum vehicula.'
]);

?>

<section class="bg-[#F9F4E8] py-20 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        
        <div class="flex justify-center md:justify-start">
            <img 
                src="{{ Vite::asset('resources/images/logo.svg') }}" 
                alt="STU Playon Logo" 
                class="w-full max-w-[400px] object-contain"
            >
        </div>

        <div class="relative">
            <div class="absolute inset-0 bg-[#FDBF2D] rounded-[2rem] translate-x-4 translate-y-6 md:translate-x-6"></div>
            
            <div class="relative z-10 bg-[#F6E69E] rounded-[2rem] p-8 md:p-12 shadow-none border-none">
                <div class="space-y-6">
                    <h3 class="text-3xl md:text-4xl font-black text-[#0D5F77] tracking-tight">
                        {{ $title }}
                    </h3>

                    <p class="text-[#0D5F77] text-lg font-medium leading-relaxed opacity-90">
                        {{ $description }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>