<?php

namespace App\Livewire\Admin;

use App\Models\Pendaftaran;
use Livewire\Component;
use Livewire\WithPagination;

class PendaftaranTable extends Component
{
    use WithPagination;

    public $search = '';

    // HAPUS BARIS INI: public $registrationRows; 
    // Karena kita akan mengirimnya langsung dari render()

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Tips: Query mulai dari Pendaftaran agar mempermudah relasi ke Event dan Peserta
        $registrations = Pendaftaran::with(['peserta', 'runningEvent'])
            ->where(function($query) {
                $query->where('bib', 'like', '%' . $this->search . '%')
                    ->orWhereHas('peserta', function($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%')
                          ->orWhere('nomor_telepon', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%');
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.pendaftaran-table', [
            'registrationRows' => $registrations
        ]);
    }
}