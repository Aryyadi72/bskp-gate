<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainAppController extends Controller
{
    public function index()
    {
        $title = 'Main App';
        return view('main-app-nd', compact('title'));
    }
}
