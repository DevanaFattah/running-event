<x-layouts.app :title="__('Dashboard')">
    {{-- @dd($stats) --}}
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

    <div class="bg-white rounded-2xl shadow-2xl border-2 border-gray-200 overflow-hidden">
    <div class="p-5 border-b-2 border-gray-100 bg-white">
        <h3 class="font-black text-gray-800 text-xl tracking-tight">List Pendaftaran Event</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-100/50 text-gray-600 text-xs uppercase tracking-tighter">
                <tr>
                    <th class="px-8 py-4 border-b whitespace-nowrap min-w-[150px]">Nama Lengkap</th>
                    <th class="px-8 py-4 border-b whitespace-nowrap min-w-[120px]">No. WhatsApp</th>
                    <th class="px-8 py-4 border-b whitespace-nowrap min-w-[180px]">Kategori Event</th>
                    <th class="px-8 py-4 border-b whitespace-nowrap text-center min-w-[120px]">No. BIB</th>
                    <th class="px-8 py-4 border-b whitespace-nowrap min-w-[150px]">Status</th>
                    <th class="px-8 py-4 border-b whitespace-nowrap text-right min-w-[250px]">Aksi Admin</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($registrations as $reg)
                <tr class="hover:bg-gray-50/80 transition-colors">
                    <td class="px-4 py-6 font-bold text-gray-900 whitespace-nowrap">{{ $reg['nama'] }}</td>
                    <td class="px-4 py-6 text-gray-700 whitespace-nowrap">{{ $reg['no_hp'] }}</td>
                    
                    {{-- FIX KATEGORI EVENT: Pakai whitespace-nowrap --}}
                    <td class="px-4 py-6 whitespace-nowrap">
                        <span class="inline-block px-3 py-1 bg-gray-900 text-white rounded-md text-xs font-bold shadow-sm">
                            {{ $reg['event'] }}
                        </span>
                    </td>

                    {{-- FIX NO BIB: Pakai whitespace-nowrap --}}
                    <td class="px-4 py-6 text-center whitespace-nowrap">
                        <span class="inline-block font-mono bg-yellow-100 text-yellow-800 px-3 py-1 rounded-fulxl border border-yellow-200 text-xs font-bold">
                            {{ $reg['bib'] }}
                        </span>
                    </td>

                    <td class="px-4 py-6 whitespace-nowrap">
                        <span class="{{ $reg['is_taken'] ? 'text-green-600' : 'text-red-500' }} font-black text-xs uppercase italic">
                            ● {{ $reg['status_bib'] }}
                        </span>
                    </td>

                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end items-center gap-3">
                            @if(!$reg['is_taken'])
                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="whitespace-nowrap bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase transition shadow-md">
                                        Tandai Diambil
                                    </button>
                                </form>
                            @else
                                <span class="bg-gray-100 text-emerald-700 px-4 py-2 rounded-lg text-xs font-bold uppercase border border-emerald-200">
                                    Selesai
                                </span>
                            @endif

                            {{-- Tombol Cetak BIB --}}
                            @if($reg['is_taken'])
                                <a href="#" class="whitespace-nowrap bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase transition shadow-md">
                                    Cetak BIB
                                </a>
                            @else
                                <button disabled class="whitespace-nowrap bg-gray-200 text-gray-400 cursor-not-allowed px-4 py-2 rounded-lg text-xs font-bold uppercase border border-gray-300">
                                    Cetak BIB
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-layouts.app>
