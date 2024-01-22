<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Http\Requests\StoreBeatRequest;
use App\Http\Requests\UpdateBeatRequest;

class BeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBeatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Http\Response
     */
    public function show(Beat $beat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Http\Response
     */
    public function edit(Beat $beat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBeatRequest  $request
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBeatRequest $request, Beat $beat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beat $beat)
    {
        //
    }
}
