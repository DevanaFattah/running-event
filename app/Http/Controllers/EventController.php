<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        Event::create($request->validate([
            'nama_event' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]));

        return redirect('/admin/event');
    }
}
