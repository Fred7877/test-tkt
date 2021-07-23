<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Compagny;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CompagnyController extends Controller
{
    /**
     * Get the of compagnies paginated.
     * number of element is 15 by default.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($numberElement = 15)
    {
        return view('app');
    }
}
