<?php

namespace App\Http\Controllers;

use App\Models\AppLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AppLinkController extends Controller
{
    public function index()
    {
        $title = 'List Aplikasi';
        $links = AppLink::all();
        return view('app-links/index', compact('links', 'title'));
    }

    public function store(Request $request)
    {
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
            Alert::success('Success!', 'Your Post as been submited!');
            return redirect()->route('app-index');
        } else {
            Alert::error('Error!', 'Your Post as been submited!');
            return redirect()->route('app-index');
        }

        // return redirect()->route('app-index')->with('success', 'Link berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
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
            Alert::success('Success!', 'Your Post has been edited!');
            return redirect()->route('app-index');
        } else {
            Alert::error('Error!', 'Failed to edit your Post!');
            return redirect()->route('app-index');
        }

        // $appUp = $dataApp->update([
        //     'name' => $request->name,
        //     'url' => $request->url,
        //     'slug' => $slug,
        //     'color' => $request->color,
        // ]);

        // if ($appUp) {
        //     Alert::success('Success!', 'Your Post as been edited!');
        //     return redirect()->route('app-index');
        // } else {
        //     Alert::error('Error!', 'Your Post as been edited!');
        //     return redirect()->route('app-index');
        // }
    }

    public function destroy($id)
    {
        $data = AppLink::find($id);

        $appDel = $data->delete();

        if ($appDel) {
            Alert::success('Success!', 'Data bibit masuk berhasil dihapus.');
            return redirect()->route('app-index');
        } else {
            Alert::error('Error!', 'Data bibit masuk gagal dihapus.');
            return redirect()->route('app-index');
        }
    }
}
