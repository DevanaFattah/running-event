<x-layouts.app>
<div class="min-h-screen bg-gray-50 dark:bg-[#121212] rounded-2xl p-4 sm:p-8 transition-colors duration-500">
    <div class="max-w-4xl mx-auto">
        <div class="mb-10">
            <h2 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">Pendaftaran Peserta Baru</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2 font-medium">Lengkapi informasi di bawah untuk mendaftarkan pelari baru.</p>
        </div>

        <div class="bg-white dark:bg-[#1e1e1e] rounded-3xl shadow-xl dark:shadow-2xl border border-gray-200 dark:border-white/5 overflow-hidden transition-all">
            <form id="formPendaftaran" action="{{ route('admin.create') }}" method="POST" class="p-8 sm:p-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                    
                    @php
                        $inputClass = "w-full bg-gray-50 dark:bg-[#252525] border-2 border-transparent text-gray-900 dark:text-white px-5 py-4 rounded-2xl focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none font-semibold placeholder:text-gray-400 dark:placeholder:text-gray-600";
                        $labelClass = "block text-[10px] font-black text-gray-500 dark:text-gray-500 uppercase tracking-[0.2em] mb-3 group-focus-within:text-indigo-600 dark:group-focus-within:text-indigo-400 transition-colors";
                    @endphp

                    <div class="group">
                        <label class="{{ $labelClass }}">Nama Lengkap</label>
                        <input type="text" name="nama" required class="{{ $inputClass }}" placeholder="Contoh: Ahmad Subardjo">
                    </div>

                    <div class="group">
                        <label class="{{ $labelClass }}">Nomor WhatsApp</label>
                        <input type="tel" name="no_telepon" required class="{{ $inputClass }}" placeholder="0812xxxxxx">
                    </div>

                    <div class="group">
                        <label class="{{ $labelClass }}">Alamat Email</label>
                        <input type="email" name="email" required class="{{ $inputClass }}" placeholder="email@pelari.com">
                    </div>

                    <div class="group">
                        <label class="{{ $labelClass }}">Umur</label>
                        <input type="number" name="umur" required class="{{ $inputClass }}" placeholder="25">
                    </div>

                    <div class="group relative">
                        <label class="{{ $labelClass }}">Jenis Kelamin</label>
                        <div class="relative">
                            <select name="jenis_kelamin" required 
                                class="{{ $inputClass }} appearance-none cursor-pointer pr-12">
                                <option value="" disabled selected class="bg-white dark:bg-[#1e1e1e]">Pilih Gender</option>
                                <option value="L" class="bg-white dark:bg-[#1e1e1e] text-gray-900 dark:text-white">Laki-laki</option>
                                <option value="P" class="bg-white dark:bg-[#1e1e1e] text-gray-900 dark:text-white">Perempuan</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="group relative">
                        <label class="{{ $labelClass }}">Kategori Event</label>
                        <div class="relative">
                            <select name="kategori" required 
                                class="{{ $inputClass }} appearance-none cursor-pointer pr-12 !text-indigo-600 dark:!text-indigo-400 font-black">
                                <option value="" disabled selected class="bg-white dark:bg-[#1e1e1e]">Pilih Jarak</option>
                                <option value="5K" class="bg-white dark:bg-[#1e1e1e]">5 KM</option>
                                <option value="10K" class="bg-white dark:bg-[#1e1e1e]">10 KM</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-indigo-400/50 group-focus-within:text-indigo-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-16 flex flex-col sm:flex-row items-center justify-between border-t border-gray-100 dark:border-white/5 pt-10 gap-6">
                    <button type="button" onclick="history.back()" class="text-gray-500 hover:text-gray-800 dark:hover:text-white font-bold transition-colors">
                        Kembali ke Dashboard
                    </button>
                    
                    <button type="submit" id="btnDaftar" 
                        class="w-full sm:w-auto relative bg-indigo-600 hover:bg-indigo-500 disabled:bg-gray-300 dark:disabled:bg-gray-700 disabled:cursor-not-allowed text-white px-10 py-4 rounded-2xl font-black uppercase tracking-widest transition-all active:scale-95 shadow-lg shadow-indigo-500/25 flex items-center justify-center gap-3 group">
                        
                        <span id="textNormal" class="flex items-center gap-3">
                            Daftarkan Peserta
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>

                        <span id="textLoading" class="hidden flex items-center gap-3 italic opacity-80">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
        const btn = document.getElementById('btnDaftar');
        const textNormal = document.getElementById('textNormal');
        const textLoading = document.getElementById('textLoading');

        btn.disabled = true;
        textNormal.classList.add('hidden');
        textLoading.classList.remove('hidden');
        
        // Form akan berlanjut submit ke backend secara alami
    });
</script>
</x-layouts.app>