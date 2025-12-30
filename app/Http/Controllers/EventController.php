<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
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
