<?php

use function Livewire\Volt\{state, rules};


state([
    'nama_lengkap' => '',
    'nomor_hp' => '',
    'email' => '',
    'jenis_kelamin' => '',
    'tanggal_lahir' => '',
    'umur' => '',
    // 'eventName' => ['TAHUN', 'BARU(A)N']
]);

rules([
    'nama_lengkap' => 'required|min:3',
    'nomor_telepon' => 'required|numeric',
    'email' => 'required|email',
    'tanggal_lahir' => 'required',
    'umur' => 'required|numeric',
]);

$submit = function () {
    $this->validate();
    
    // Logika simpan data pendaftaran di sini
    session()->flash('message', 'Pendaftaran Berhasil!');
};

$resetForm = function () {
    $this->reset();
};

?>

{{-- @dd($event) --}}


<section class="bg-[#F6E69E] min-h-screen py-16 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-[#0D5F77] uppercase tracking-tight">Form Pendaftaran</h2>
            
        </div>

        <form wire:submit="submit" class="space-y-4" action="{{ route('event.regist', $event->id) }}">
            @php
                $fields = [
                    ['id' => 'nama_lengkap', 'label' => 'Nama Lengkap', 'type' => 'text'],
                    ['id' => 'nomor_telepon', 'label' => 'Nomor HP', 'type' => 'text'],
                    ['id' => 'email', 'label' => 'Email', 'type' => 'email'],
                    ['id' => 'umur', 'label' => 'Umur', 'type' => 'text'],
                ];
            @endphp

            <p class="text-3xl font-black text-[#0D5F77] mt-2">
                {{ $event['nama_event'] }}
            </p>

            @foreach($fields as $field)
                <div class="flex flex-col gap-1"> <div class="flex flex-col md:flex-row md:items-center bg-[#FFF9F0] rounded-xl overflow-hidden shadow-sm border border-black/5">
                        <label for="{{ $field['id'] }}" class="w-full md:w-1/3 px-6 py-4 text-sm font-black text-[#0D5F77] flex items-center gap-1 uppercase">
                            {{ $field['label'] }} <span class="text-yellow-500">*</span>
                            <span class="ml-auto hidden md:block">:</span>
                        </label>
                        <input 
                            type="{{ $field['type'] }}" 
                            id="{{ $field['id'] }}"
                            wire:model="{{ $field['id'] }}"
                            class="w-full md:w-2/3 px-6 py-4 bg-transparent text-[#0D5F77] font-bold placeholder-[#0D5F77]/30 border-none focus:ring-0"
                        >
                    </div>
                    
                    @error($field['id']) 
                        <span class="text-red-500 text-xs font-bold md:ml-[33.3%] px-2 italic uppercase tracking-tighter">
                            ⚠️ {{ $message }}
                        </span> 
                    @enderror
                </div>
            @endforeach

            <div class="flex flex-col gap-1">
                <div class="flex items-center bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                    <label class="w-1/3 text-[#0D5F77] font-black uppercase text-sm tracking-tight">
                        Jenis Kelamin <span class="text-orange-500">*</span>
                    </label>
                    <span class="text-[#0D5F77] font-black mr-4">:</span>
                    
                    <div class="flex-1 relative">
                        <select wire:model="jenis_kelamin" class="w-full bg-transparent border-none focus:ring-0 font-bold text-[#0D5F77] appearance-none cursor-pointer p-0">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        </div>
                </div>
                @error('jenis_kelamin') 
                    <span class="text-red-500 text-xs font-bold md:ml-[33.3%] px-2 italic uppercase tracking-tighter">
                        ⚠️ {{ $message }}
                    </span> 
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-6 pt-8">
                <button 
                    type="button"
                    wire:click="resetForm"
                    class="bg-[#0D5F77] hover:bg-[#0a4a5d] text-white font-black py-4 rounded-xl shadow-md uppercase tracking-widest text-sm transition-all active:scale-95"
                >
                    Reset
                </button>
                
                <button 
                    type="submit"
                    class="bg-[#FDBF2D] hover:bg-[#eab028] text-[#0D5F77] font-black py-4 rounded-xl shadow-md uppercase tracking-widest text-sm transition-all active:scale-95"
                >
                    Melu Playon!
                </button>
            </div>
        </form>

        @if (session()->has('message'))
            <div class="mt-6 p-4 bg-green-500 text-white font-black rounded-xl text-center uppercase italic animate-bounce">
                {{ session('message') }}
            </div>
        @endif
    </div>
</section>