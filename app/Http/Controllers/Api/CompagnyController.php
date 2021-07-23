<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Compagny;
use App\Http\Controllers\Controller;

class CompagnyController extends Controller
{
    /**
     * Get all compagnies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Compagny::all();
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
     * Display a specific compagny with result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Compagny $compagny)
    {
        return $compagny->load('results');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
