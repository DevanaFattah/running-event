<x-layouts.event.app>
     <!-- Navbar-->
<nav class="bg-[#FFF8E6] border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    
    <!-- Logo -->
    <div class="flex items-center gap-2">
      <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="STU Playon" class="h-10 w-40 object-contain">
      {{-- <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="STU Playon" class="h-10 scale-125 origin-left"> --}}
    </div>

    <!-- Menu -->
    <ul class="flex items-center gap-8 text-sm font-semibold text-gray-800 pr-[16vh]">
      <li>
        <a href="#" class="hover:text-teal-600 transition">HOME</a>
      </li>
      <li>
        <a href="#" class="hover:text-teal-600 transition">PLAYON!</a>
      </li>
      <li>
        <a href="#" class="hover:text-teal-600 transition">ABOUT</a>
      </li>
      <li>
        <a href="#" class="hover:text-teal-600 transition">NEWS</a>
      </li>
    </ul>

  </div>
</nav>

  <!-- Detail -->
  <livewire:event.regist />
 
  <!-- FOOTER -->
  <livewire:event.footer />
</x-layouts.app>