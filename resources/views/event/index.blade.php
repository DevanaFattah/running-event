<x-layouts.event.app>

  {{-- @dd($event) --}}
     <!-- Navbar-->
  <nav class="bg-[#FFF8E6] border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    @if (session()->has('message'))
            <div id="success-alert" class="transform transition-all duration-500">
                <div class="bg-[#FDBF2D] border-4 border-[#0D5F77] rounded-2xl p-5 shadow-[8px_8px_0px_0px_#0D5F77] flex items-center gap-4 animate-bounce">
                    <div class="flex-shrink-0 w-12 h-12 bg-[#0D5F77] rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-[#FDBF2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-[#0D5F77] font-black uppercase tracking-tighter text-xl leading-none">BERHASIL DAFTAR!</h3>
                        <p class="text-[#0D5F77] font-bold text-sm opacity-90">{{ session('message') }}</p>
                    </div>
                    <button onclick="document.getElementById('success-alert').remove()" class="text-[#0D5F77]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    const alert = document.getElementById('success-alert');
                    if(alert) {
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateY(-20px)';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
    
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

  <!-- HERO -->
  <livewire:event.hero />

  <!-- EVENT HIGHLIGHT -->
  <livewire:event.newest-event :event="$event" />

  <!-- ABOUT -->
  <livewire:event.about-section />

  <!-- EVENTS LIST -->
  <livewire:event.listing :others="$others" />

  <!-- FOOTER -->
  <livewire:event.footer />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      // Jalankan script setiap kali halaman dimuat
      document.addEventListener('DOMContentLoaded', function () {
          @if (session()->has('message'))
              Swal.fire({
                  title: 'MANTAP!',
                  text: "{{ session('message') }}",
                  icon: 'success',
                  confirmButtonColor: '#FDBF2D',
                  confirmButtonText: 'OKE',
                  background: '#FFF8E6',
                  color: '#0D5F77',
                  customClass: {
                      popup: 'rounded-[2rem] border-4 border-[#0D5F77]',
                      title: 'font-black uppercase',
                      confirmButton: 'rounded-xl font-bold px-8'
                  }
              });
          @endif
      });
  </script>
</x-layouts.app>