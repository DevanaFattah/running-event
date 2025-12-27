<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        // $process = new Process([
        //     'py',
        //     base_path('resources/scripts/scraper.py')
        // ]);

        // $process->run();

        // dd($process->getOutput(), $process->getErrorOutput());
        // $python = env('PYTHON_PATH');
        // $script = base_path(env('SCRIPT_PATH'));

        // $result = Process::run([
        //     $python,
        //     $script,
        // ]);

        // if (! $result->successful()) {
        //     dd('Python error:', $result->errorOutput());
        // }
        // $output = trim($result->output());

        // $data = json_decode($output, true);

        // if (json_last_error() !== JSON_ERROR_NONE) {
        //     dd('Invalid JSON from Python', $output);
        // }

        // dd($data);

        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.regist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('event.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
