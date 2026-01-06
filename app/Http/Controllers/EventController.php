<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Number;
use App\Models\RunningEvent;
use App\Models\Pendaftaran;

class EventController extends Controller
{
    public function index()
    {
        $events = RunningEvent::get();
        // dd($events);

        $event = [
            'id' => $events->first()->id,
            'title' => $events->first()->nama_event,
            'date' => $events->first()->tanggal,
            'start' => '06:00 WIB',
            'flag_off' => '07:00 WIB',
            'distance' => @$events->first()->kategori,
            'elevation' => '70 M',
            'lokasi' => $events->first()->lokasi,
            'subLokasi' => $events->first()->subLokasi,
            'deskripsi' => $events->first()->deskripsi
        ];

        $others = collect($events)->where('id', '!=', $event['id']);

        return view('event.index', [
            'event' => $event,
            'others' => $others,
        ]);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function show($id)
    {
        $event = RunningEvent::findOrFail($id);

        return view('event.detail', [
            'event' => $event
        ]);
    }
    
    public function registForm($id)
    {
        $event = RunningEvent::findOrFail($id);



        return view('event.regist', [
            'event' => $event
        ]);
    }

    public function regist(Request $request, $id)
    {
        // $peserta = RunnningEvent::create($request->validate([
        //     'nama_event' => 'required',
        //     'event_id' => 'required',
        //     'tanggal' => 'required',
        //     'lokasi' => 'required',
        //     'deskripsi' => 'required',
        //     'jenis_kelamin' => 'required',
        // ]));

        // return redirect('dashboard');

        $lastBib = Pendaftaran::where('event_id', $request->event_id)->where('kategori', $request->kategori)->pluck('bib')->last();

        $currentBib = Number::parseInt(Str::remove('BIB-', $lastBib)) + 1;

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'nomor_telepon' => 'required',
            'kategori' => 'required|in:5KM,10KM',
            'event_id' => 'required|integer|exists:events,id',
        ]);
        // lanjut proses simpan data

        Pendaftaran::create($request->only([
            'peserta_id' => $request()->user()->id,
            'event_id' => $id,
            'kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'jenis_kelamin' => 'required',
        ]) + [
            'bib' => $currentBib
        ]);

        // $this->service->daftar($request->all() + [
        //     'bib' => $currentBib,
        // ]);

        return back()->with('success', 'pendaftaran berhasil');
    }
}
