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
     * Display a specific compagny with result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Compagny $compagny)
    {
        return $compagny->load('results');
    }
}
