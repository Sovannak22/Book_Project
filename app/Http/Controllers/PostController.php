<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Comment;
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
        $posts = Post::all()->sortByDesc('created_at');
        $comment = Comment::all();
        return view('posts.feeds', compact(['posts', 'comment']));
    }
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
    public function like($id)
    {
      $current = Carbon::now();
      $current = new Carbon();
      $post = Post::find($id);
      $post->users()->attach(Auth::user()->id, ['created_at' => $current, 'updated_at' => $current]);
      return back();
    }
}
