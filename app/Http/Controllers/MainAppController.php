<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\AppLink;
use Tymon\JWTAuth\Facades\JWTAuth;

class MainAppController extends Controller
{
    // public function index(Request $request)
    // {
    //     $title = 'Main App';
    //     $links = AppLink::all()->sortBy('name');
    //     $token = $request->query('token');
    //     if (JWTAuth::setToken($token)->check()) {
    //         $request->session()->put('jwt_token', $token);
    //     }
    //     return view('main-app', compact('title', 'links'));
    // }

    public function index(Request $request)
    {
        $token = $request->query('token');
        if ($token && JWTAuth::setToken($token)->check()) {
            $title = 'Main App';
            $links = AppLink::all()->sortBy('name');
            return view('main-app', compact('title', 'links'));
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
