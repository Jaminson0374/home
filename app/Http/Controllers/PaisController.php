<?php

namespace App\Http\Controllers;

use App\Models\PaisModell;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paisese = PaisModell::all();
        return $paisese;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaisModell  $paisModell
     * @return \Illuminate\Http\Response
     */
    public function show(PaisModell $paisModell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaisModell  $paisModell
     * @return \Illuminate\Http\Response
     */
    public function edit(PaisModell $paisModell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaisModell  $paisModell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaisModell $paisModell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaisModell  $paisModell
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaisModell $paisModell)
    {
        //
    }
}
