<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogActivity;
use App\Models\LogActivityDetail;
use DB;

class ActivityLogController extends Controller
{
    public function index()
    {
        $title = 'Activity Log';
        // $logs = LogActivity::all();
        $logs = DB::table('log_activities')
            ->join('users', 'log_activities.nik', '=', 'users.nik')
            ->select('users.name', 'users.dept', 'log_activities.*')
            ->orderBy('log_activities.created_at', 'desc')
            ->get();
        // dd($logs);
        return view('index-activity-log', compact('title', 'logs'));
    }
}
