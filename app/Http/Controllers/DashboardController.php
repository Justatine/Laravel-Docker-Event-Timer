<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $events = Events::where('userId', $user->id)->orderByDesc('created_at')->get();

        return view('pages.dashboard.index',[
            'user' => $user,
            'events' => $events
        ]);
    }
}
