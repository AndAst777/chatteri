<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = auth()->user();

        $liker->likes()->attach($post);

        return redirect()->route('main')->with('succes', 'Liked succesfully');
    }
    public function unlike(Post $post)
    {
        $liker = auth()->user();
        $liker->likes()->detach($post);
        return redirect()->route('main')->with('succes', 'Liked succesfully');
    }
}
