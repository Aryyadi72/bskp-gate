<?php

namespace App\Http\Controllers;

use App\Models\AppLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Tymon\JWTAuth\Facades\JWTAuth;

class AppLinkController extends Controller
{
    public function index(Request $request)
    {
        $title = 'List Aplikasi';
        $links = AppLink::all();
        $token = $request->query('token');
        if (JWTAuth::setToken($token)->check()) {
            $request->session()->put('jwt_token', $token);
        }
        return view('app-links/index', compact('links', 'title'));
    }

    public function store(Request $request)
    {
        $token = session('jwt_token');

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'color' => 'string|max:225'
        ]);

        $slug = Str::slug($request->get('name'), '-');
        $data = $request->all();
        $data['slug'] = $slug;
        $appSave = AppLink::create($data);

        if ($appSave) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Your Post as been submited!');
            // return redirect()->route('app-index');
            return redirect()->route('app-index', ['token' => $token]);
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Your Post not submited!');
            // return redirect()->route('app-index');
            return redirect()->route('app-index', ['token' => $token]);
        }
    }

    public function update(Request $request, $id)
    {
        $token = session('jwt_token');

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'color' => 'nullable|string|max:225'
        ]);

        $dataApp = AppLink::find($id);
        $slug = Str::slug($request->get('name'), '-');

        if ($dataApp->update([
            'name' => $request->name,
            'url' => $request->url,
            'slug' => $slug,
            'color' => $request->color,
        ])) {
            toastr()->closeOnHover(true)->closeDuration(10)->success('Your Post as been edited!');
            return redirect()->route('app-index', ['token' => $token]);
        } else {
            toastr()->closeOnHover(true)->closeDuration(10)->error('Failed to edit your Post');
            return redirect()->route('app-index', ['token' => $token]);
        }
    }

    public function destroy($id, Request $request)
    {
        $token = $request->input('token');

        if ($token && JWTAuth::setToken($token)->check()) {
            // Lanjutkan dengan penghapusan
            $appLink = AppLink::find($id);

            if ($appLink) {
                $appLink->delete();
                toastr()->closeOnHover(true)->closeDuration(10)->success('Your Post as been deleted!');
            } else {
                toastr()->closeOnHover(true)->closeDuration(10)->error('Failed to delete your Post');
            }

            return redirect()->route('app-index', ['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
