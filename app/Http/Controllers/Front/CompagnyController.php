<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class CompagnyController extends Controller
{
    /**
     * Show the compagnies list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app');
    }
}
