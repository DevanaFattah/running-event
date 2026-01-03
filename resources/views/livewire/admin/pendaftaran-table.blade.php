<div class="bg-white rounded-2xl shadow-2xl border-2 border-gray-200 overflow-hidden">
    {{-- Header Section --}}
    <div class="p-6 border-b-2 border-gray-100 bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-black text-gray-800 text-xl tracking-tight">List Pendaftaran Event</h3>
            @if (auth()->user()->role === 'superadmin')
                <a href="{{ route('admin.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Event
                </a>
            @endif
        </div>

        {{-- SEARCH BAR --}}
        <div class="relative">
            <input 
                wire:model.live.debounce.300ms="search"
                type="text" 
                placeholder="Cari nama, whatsapp, atau nomor BIB..." 
                class="w-full text-black pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-indigo-500 focus:bg-white transition-all font-bold text-sm"
            >
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Tabel Section (Persis Seperti Punya Kamu) --}}
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
                    <td class="px-6 py-5 font-bold text-gray-900 whitespace-nowrap">{{ $row->peserta->nama }}</td>
                    <td class="px-6 py-5 whitespace-nowrap">{{ $row->peserta->nomor_telepon }}</td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <span class="inline-block px-3 py-1 bg-gray-900 text-white rounded-md text-[10px] font-black uppercase">
                            {{ $row->runningEvent->nama_event }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-center whitespace-nowrap">
                        <span class="inline-block font-mono bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full border border-yellow-200 text-xs font-bold">
                            {{ $row->bib }}
                        </span>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <span class="{{ $row->status == 'sudah_diambil' ? 'text-green-600' : 'text-red-500' }} font-black text-[10px] uppercase italic">
                            ● {{ $row->status }}
                        </span>
                    </td>
                    <td class="px-6 py-5 text-right whitespace-nowrap sticky right-0 bg-white group-hover:bg-gray-50 shadow-[-10px_0_15px_-3px_rgba(0,0,0,0.05)] z-50">
                        <div class="flex justify-end gap-2">
                            @if($row->status !== 'sudah_diambil')
                                <button type="button" onclick="openAmbilBib('{{ $row->id }}', '{{ $row->peserta->nama }}')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase">Ambil</button>
                            @else
                                <span class="text-emerald-600 font-black text-[10px] uppercase border border-emerald-100 px-3 py-1.5 rounded-lg bg-emerald-50">✓ Selesai</span>
                            @endif
                            <a href="{{ route('cetakBib', $row->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase">Cetak</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>