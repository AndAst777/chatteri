<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //    $posts = Post::all();
        //    return view('main', compact("posts"));
        $posts = Post::orderByDesc('created_at')->get();
        return view('main', compact("posts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user()->id; // Получаем текущего авторизованного пользователя
        // $request->validate([
        //     'content' => 'required|max:255|string',
        //     'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        // ]);
        // if ($request->has('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();

        //     $filename = time() . '.' . $extension;
        //     $path = 'uploads/category/';
        //     $file->move($path, $filename);
        // }
        Post::create([
            'user_id' => $user,
            'content' => $request->content,

            // 'image' => $path . $filename,
        ]);

        return redirect()->route('home')->with('succes', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $post = Post::where('id', $id)->firstOrFail()->delete();
        // return redirect()->route('home')->with('success', 'Post delete succesfully!');
        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }
}
