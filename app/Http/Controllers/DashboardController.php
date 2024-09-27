<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $events = Events::where('userId', $user->id)->orderByDesc('created_at')->get();

        foreach ($events as $event) {
            if (isset($event->deadline)) {
                $event->deadline = date_format(date_create($event->deadline), 'M d, Y H:i:s');
            }
        }

        return view('pages.dashboard.index',[
            'user' => $user,
            'events' => $events
        ]);
    }

    // public function posts(){
    //     $posts = Posts::orderByDesc('created_at')->get();

    //     foreach ($posts as $post) {
    //         if (isset($post->created_at)) {
    //             $post->created_at = date_format(date_create($post->created_at), 'M d, Y H:i:s');
    //         }
    //     }

    //     return view('pages.posts', [
    //         'posts' => $posts
    //     ]);
    // }
}
