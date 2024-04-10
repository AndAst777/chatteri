<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['post_id'] = $post->id;

        Comment::create($validated);

        return redirect()->route('ideas.show', $post->id)->with('success', "Comment posted successfully!");
    }
}
