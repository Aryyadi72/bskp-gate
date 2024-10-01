<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Landing Gate';
        return view('landing-gate', compact('title'));
    }
}
