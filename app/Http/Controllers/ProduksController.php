<?php

namespace App\Http\Controllers;

use App\Models\produks;
use App\Http\Requests\StoreproduksRequest;
use App\Http\Requests\UpdateproduksRequest;

class ProduksController extends Controller
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
     * @param  \App\Http\Requests\StoreproduksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproduksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produks  $produks
     * @return \Illuminate\Http\Response
     */
    public function show(produks $produks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produks  $produks
     * @return \Illuminate\Http\Response
     */
    public function edit(produks $produks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproduksRequest  $request
     * @param  \App\Models\produks  $produks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproduksRequest $request, produks $produks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produks  $produks
     * @return \Illuminate\Http\Response
     */
    public function destroy(produks $produks)
    {
        //
    }
}
