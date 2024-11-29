<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke(){
        $posts = Post::join('users','posts.userId', '=', 'users.id')
        ->select('posts.*', 'users.name')
        ->where('posts.userId', 1)
        ->get();

        return view('pages.test',[
            'posts'=>$posts
        ]); 
    }
}
