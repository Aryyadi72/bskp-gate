<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogActivity;
use App\Models\LogActivityDetail;

class ActivityLogController extends Controller
{
    public function index()
    {
        $title = 'Activity Log';
        $logs = LogActivity::all();
        return view('index-activity-log', compact('title', 'logs'));
    }
}
