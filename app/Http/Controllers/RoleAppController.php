<?php

namespace App\Http\Controllers;

use App\Models\AppLink;
use App\Models\RoleApp;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class RoleAppController extends Controller
{
    public function index()
    {
        $title = 'Role App';
        // $roles = RoleApp::all();
        $roles = DB::table('role_apps')
            ->join('users', 'role_apps.user_id', '=', 'users.id')
            ->join('app_links', 'role_apps.app_id', '=', 'app_links.id')
            ->select('users.name', 'users.nik', 'app_links.name as appname', 'role_apps.role', 'users.email', 'role_apps.id as roleid')
            // ->sortBy('users.name')
            ->get();
        $users = User::all()->sortBy('name');
        $apps = AppLink::all()->sortBy('name');
        return view('role-app.index', [
            'title' => $title,
            'roles' => $roles,
            'users' => $users,
            'apps' => $apps
        ]);
    }

    public function store(Request $request)
    {
        $token = session('jwt_token');

        $request->validate([
            'user_id' => 'required|string|max:255',
            'app_id' => 'required',
            'role' => 'required'
        ]);

        $roleAppSave = RoleApp::create([
            'user_id' => $request->user_id,
            'app_id' => $request->app_id,
            'role' => $request->role,
        ]);

        if ($roleAppSave) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Your Post as been submited!');
            return redirect()->route('role-app-index', ['token' => $token]);
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Your Post not submited!');
            return redirect()->route('role-app-index', ['token' => $token]);
        }
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
