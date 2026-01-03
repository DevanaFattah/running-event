<x-layouts.app :title="__('Dashboard')">
    {{-- Statistik Card --}}
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        @foreach([
            ['label' => 'Total Peserta', 'value' => $stats['total_peserta'], 'color' => 'blue'],
            ['label' => 'Total Pendaftaran', 'value' => $stats['total_pendaftaran'], 'color' => 'green'],
            ['label' => 'Peserta 5K', 'value' => $stats['peserta_5k'], 'color' => 'purple'],
            ['label' => 'Peserta 10K', 'value' => $stats['peserta_10k'], 'color' => 'orange'],
            ['label' => 'BIB Belum Diambil', 'value' => $stats['bib_belum_diambil'], 'color' => 'red'],
        ] as $card)
            <div class="bg-white p-5 rounded-2xl shadow-xl border border-gray-200 transform hover:-translate-y-1 transition duration-300">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $card['label'] }}</p>
                <p class="text-3xl font-black text-gray-900 mt-2">{{ $card['value'] }}</p>
                <div class="h-1.5 w-12 bg-{{ $card['color'] }}-500 mt-4 rounded-full shadow-sm"></div>
            </div>
        @endforeach
    </div>

    {{-- Tabel Section --}}
    <div class="bg-white rounded-2xl shadow-2xl border-2 border-gray-200 overflow-hidden">
    <div class="p-6 border-b-2 border-gray-100 bg-white flex justify-between items-center">
        <h3 class="font-black text-gray-800 text-xl tracking-tight">List Pendaftaran Event</h3>
        <a href="{{ route('admin.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg transition-all active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Event
        </a>
    </div>

    <div class="overflow-x-auto overflow-y-auto max-h-[600px] relative">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 sticky top-0 z-20 text-gray-600 text-[11px] uppercase tracking-widest shadow-sm">
                <tr>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap">Nama Lengkap</th>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap">No. WhatsApp</th>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap">Kategori Event</th>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap text-center">No. BIB</th>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap">Status</th>
                    <th class="px-6 py-4 border-b bg-gray-50 whitespace-nowrap text-right sticky right-0 z-10 shadow-[-10px_0_15px_-3px_rgba(0,0,0,0.1)]">Aksi Admin</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                @foreach($registrationRows as $row)
                <tr class="hover:bg-gray-50/80 transition-colors group">
                    <td class="px-6 py-5 font-bold text-gray-900 whitespace-nowrap">{{ $row['peserta']->nama }}</td>
                    <td class="px-6 py-5 whitespace-nowrap">{{ $row['peserta']->nomor_telepon }}</td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <span class="inline-block px-3 py-1 bg-gray-900 text-white rounded-md text-[10px] font-black uppercase">
                            {{ $row['runningEvent']->nama_event }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-center whitespace-nowrap">
                        <span class="inline-block font-mono bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full border border-yellow-200 text-xs font-bold">
                            {{ $row['bib'] }}
                        </span>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <span class="{{ $row['status'] == 'sudah_diambil' ? 'text-green-600' : 'text-red-500' }} font-black text-[10px] uppercase italic">
                            ● {{ $row['status'] }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-right whitespace-nowrap sticky right-0 bg-white group-hover:bg-gray-50 shadow-[-10px_0_15px_-3px_rgba(0,0,0,0.05)] z-50">
                        <div class="flex justify-end gap-2 z-[60]">
                            @if($row['status'] !== 'sudah_diambil')
                                <button 
                                    type="button"
                                    onclick="openAmbilBib('{{ $row['id'] }}', '{{ $row['peserta']->nama }}')"
                                    class="relative z-[99] cursor-pointer bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase">
                                    Ambil
                                </button>
                            @else
                                <span class="text-emerald-600 font-black text-[10px] uppercase border border-emerald-100 px-3 py-1.5 rounded-lg bg-emerald-50">
                                    ✓ Selesai
                                </span>
                            @endif
                            <a href="{{ route('cetakBib', $row['id']) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase">Cetak</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

{{-- MODAL KONFIRMASI (HANYA SATU) --}}
<div x-data="{ open: false, id: '', nama: '', actionUrl: '' }" 
     x-on:buka-modal-ambil.window="
        open = true; 
        id = $event.detail.id; 
        nama = $event.detail.nama;
        actionUrl = '{{ route('pendaftaran.ambilBib', ':id') }}'.replace(':id', id);
     "
     x-show="open" 
     class="fixed inset-0 z-[9999] overflow-y-auto"
     x-cloak>
    
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/70 backdrop-blur-sm"></div>

    <div class="relative min-h-screen flex items-center justify-center p-6">
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 opacity-0"
             x-transition:enter-end="scale-100 opacity-100"
             x-on:click.away="open = false" 
             {{-- max-w-lg membuat modal jauh lebih besar dari sebelumnya --}}
             class="bg-white dark:bg-[#1e1e1e] w-full max-w-lg rounded-[3rem] p-10 shadow-2xl border border-gray-100 dark:border-white/5 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-emerald-500"></div>

            <div class="text-center py-4">
                <div class="mx-auto h-24 w-24 bg-emerald-100 dark:bg-emerald-500/10 rounded-full flex items-center justify-center mb-6 shadow-inner">
                    <svg class="h-12 w-12 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                
                <h3 class="text-3xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Konfirmasi Ambil</h3>
                
                <div class="mt-4 p-4 bg-gray-50 dark:bg-white/5 rounded-2xl border border-dashed border-gray-200 dark:border-white/10">
                    <p class="text-gray-500 dark:text-gray-400 font-medium">Anda akan menandai BIB milik:</p>
                    <p class="text-2xl font-black text-indigo-500 mt-1 italic" x-text="nama"></p>
                </div>
            </div>

            <div class="mt-10 flex flex-col gap-3">
                <form x-bind:action="actionUrl" method="POST">
                    @csrf
                    <button type="submit" 
                        class="w-full py-5 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl font-black text-lg uppercase tracking-[0.1em] shadow-xl shadow-emerald-500/30 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                        Konfirmasi Sekarang
                    </button>
                </form>

                <button x-on:click="open = false" type="submit"
                    class="w-full py-4 text-gray-400 font-bold hover:text-gray-600 dark:hover:text-white transition-colors uppercase text-sm tracking-widest">
                    Batalkan Pengambilan
                </button>
            </div>
        </div>
    </div>
</div> 

<script>
    function openAmbilBib(id, nama) {
        // Log ini untuk memastikan tombol beneran kepencet
        // console.log('Tombol ditekan untuk ID:', id); 
        
        // Kirim sinyal ke Alpine Modal
        window.dispatchEvent(new CustomEvent('buka-modal-ambil', { 
            detail: { 
                id: id, 
                nama: nama 
            } 
        }));
    }
</script>
</x-layouts.app>