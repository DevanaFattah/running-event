<div class="max-w-4xl mx-auto py-12 px-6">
    <div class="bg-[#0D5F77] rounded-t-3xl p-8 text-center">
        <h2 class="text-[#FDBF2D] text-3xl md:text-5xl font-black uppercase tracking-tighter">
            Formulir Pendaftaran
        </h2>
        <p class="text-white font-bold mt-2 uppercase tracking-widest text-sm opacity-80">
            {{ $event['title'] ?? 'Nama Event Tidak Ditemukan' }}
        </p>
    </div>

    <div class="bg-white border-x-4 border-b-4 border-[#0D5F77] rounded-b-3xl p-8 shadow-2xl">
        <form wire:submit.prevent="save" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-[#0D5F77] font-black uppercase text-sm tracking-tight">Field Placeholder 1</label>
                    <input type="text" class="border-2 border-[#0D5F77]/20 rounded-xl px-4 py-3 focus:border-[#FDBF2D] focus:ring-0 transition-all font-bold text-[#0D5F77]" placeholder="Contoh input...">
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[#0D5F77] font-black uppercase text-sm tracking-tight">Field Placeholder 2</label>
                    <input type="text" class="border-2 border-[#0D5F77]/20 rounded-xl px-4 py-3 focus:border-[#FDBF2D] focus:ring-0 transition-all font-bold text-[#0D5F77]" placeholder="Contoh input...">
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[#0D5F77] font-black uppercase text-sm tracking-tight">Catatan Tambahan</label>
                <textarea rows="3" class="border-2 border-[#0D5F77]/20 rounded-xl px-4 py-3 focus:border-[#FDBF2D] focus:ring-0 transition-all font-bold text-[#0D5F77]" placeholder="Tuliskan jika ada..."></textarea>
            </div>

            <hr class="border-dashed border-2 border-[#0D5F77]/10 my-8">

            <div class="flex justify-end">
                <button type="submit" class="bg-[#FDBF2D] hover:bg-[#e6ac28] text-[#0D5F77] font-black text-xl px-12 py-4 rounded-2xl shadow-[6px_6px_0px_0px_#0D5F77] hover:shadow-none hover:translate-x-[3px] hover:translate-y-[3px] transition-all uppercase">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>

    <p class="mt-6 text-center text-[#0D5F77]/50 font-bold text-xs uppercase tracking-widest">
        Pastikan data yang Anda masukkan sudah benar sebelum menekan tombol daftar.
    </p>
</div>