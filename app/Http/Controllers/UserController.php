<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $title = "User Account";
        $userAccount = User::all();
        return view('user.index', [
            'title' => $title,
            'userAccount' => $userAccount
        ]);
    }

    public function create()
    {
        $title = "User Account - Create";
        return view('user.create', [
            'title' => $title,
        ]);
    }

    public function store(StoreRequest $request)
    {
        // dd($request->all());

        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'status' => $request->status,
            'dept' => $request->dept,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alert::Success('Success!', 'User telah berhasil ditambahkan.');
        return redirect()->route('user-index');
    }
}
