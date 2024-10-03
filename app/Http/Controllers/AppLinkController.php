<?php

namespace App\Http\Controllers;

use App\Models\AppLink;
use Illuminate\Http\Request;
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
        ]);

        AppLink::create($request->all());

        return redirect()->route('app-index')->with('success', 'Link berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $data = AppLink::find($id);

        $data->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        if ($data) {
            Alert::success('Success!', 'Data bibit masuk berhasil diperbarui.');
            return redirect()->route('app-index');
        } else {
            Alert::error('Error!', 'Data bibit masuk gagal diperbarui.');
            return redirect()->route('app-index');
        }
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
