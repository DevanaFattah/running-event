<?php

use function Livewire\Volt\{state};

state([
    'socials' => [
        ['name' => 'instagram.com/stu.playon', 'icon' => 'instagram'],
        ['name' => 'tiktok.com/stu.playon', 'icon' => 'tiktok'],
        ['name' => 'youtube.com/stu.playon', 'icon' => 'youtube'],
        ['name' => 'facebook.com/stu.playon', 'icon' => 'facebook'],
        ['name' => 'x.com/stu.playon', 'icon' => 'x-twitter'],
    ],
    'contacts' => [
        ['val' => 'contact@stu.playon', 'icon' => 'envelope'],
        ['val' => '021-777777777', 'icon' => 'phone'],
        ['val' => 'wa.me/08888888888', 'icon' => 'whatsapp'],
    ]
]);

?>

<footer class="bg-[#FDBF2D] pt-16 pb-8 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-start">
            
            <div class="flex justify-center md:justify-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="STU Playon" class="w-48 object-contain">
            </div>

            <div class="md:border-l-4 border-[#0D5F77] md:pl-10 space-y-4">
                <h4 class="text-[#0D5F77] font-black text-xl uppercase tracking-tighter">Find Us</h4>
                <ul class="space-y-2">
                    @foreach($socials as $social)
                        <li class="flex items-center gap-3 group">
                            {{-- Menggunakan Icon FontAwesome atau SVG --}}
                            <i class="fa-brands fa-{{ $social['icon'] }} text-[#0D5F77] text-lg"></i>
                            <a href="#" class="text-[#0D5F77] font-bold text-sm hover:underline uppercase tracking-tight">
                                {{ $social['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="md:border-l-4 border-[#0D5F77] md:pl-10 space-y-4">
                <h4 class="text-[#0D5F77] font-black text-xl uppercase tracking-tighter">Contact Us</h4>
                <ul class="space-y-3">
                    @foreach($contacts as $contact)
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-{{ $contact['icon'] }} text-[#0D5F77] text-lg"></i>
                            <span class="text-[#0D5F77] font-bold text-sm uppercase tracking-tight">
                                {{ $contact['val'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-20 pt-8 border-t border-[#0D5F77]/10 text-center">
            <p class="text-[#0D5F77] font-bold text-[10px] md:text-xs uppercase tracking-widest opacity-80">
                © STU PLAYON 2025 All Right Reserved. Made with <span class="text-red-600">❤️</span> for Cah-cah Playon!
            </p>
        </div>
    </div>
</footer>