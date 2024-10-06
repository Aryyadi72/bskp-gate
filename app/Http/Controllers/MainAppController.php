<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppLink;

class MainAppController extends Controller
{
    public function index()
    {
        $title = 'Main App';
        $links = AppLink::all()->sortBy('name');
        return view('main-app', compact('title', 'links'));
    }
}
