<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
    //
    public function __construct() {
      return $this->middleware('auth');
    }
    public function store(Request $request) {
      $post = new Post;
      $post->description = $request->get('description');
      $id=Auth::user()->id;
      $post->user_id = $id;
      $post->save();

      return redirect('feeds');
    }
    public function index()
    {
        $posts = Post::all();

        return view('posts.feeds', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
