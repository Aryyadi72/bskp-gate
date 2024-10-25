<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('token');
        $news = DB::table('news')
            ->join('users', 'news.author_id', '=', 'users.id')
            ->select('users.name', 'news.*')
            ->get();
        $title = 'News';
        return view('news.index', [
            'token' => $token,
            'title' => $title,
            'news' => $news
        ]);
    }

    public function Store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
