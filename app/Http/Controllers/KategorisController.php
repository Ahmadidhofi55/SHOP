<?php

namespace App\Http\Controllers;

use App\Models\kategoris;
use App\Http\Requests\StorekategorisRequest;
use App\Http\Requests\UpdatekategorisRequest;

class KategorisController extends Controller
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
     * @param  \App\Http\Requests\StorekategorisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekategorisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function show(kategoris $kategoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function edit(kategoris $kategoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekategorisRequest  $request
     * @param  \App\Models\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekategorisRequest $request, kategoris $kategoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategoris $kategoris)
    {
        //
    }
}
