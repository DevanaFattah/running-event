<?php

use function Livewire\Volt\{state};

state([
    'headline' => 'LOREM IPSUM',
    'subheadline' => 'Lorem ipsum dolor sit amet LOREM IPSUM'
]);

?>

<section class="relative w-full h-[400px] md:h-[600px] overflow-hidden">
    <img 
        src="{{ Vite::asset('resources/images/hero.png') }}" 
        alt="Hero Running" 
        class="w-full h-full object-cover"
    >

    <div class="absolute inset-0 bg-black/30"></div>

    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-white text-5xl md:text-8xl font-black tracking-tighter uppercase leading-none drop-shadow-2xl">
            {{ $headline }}
        </h1>
        
        <p class="mt-4 text-white text-sm md:text-xl font-bold tracking-wide uppercase drop-shadow-md">
            {{ $subheadline }}
        </p>
    </div>
</section>