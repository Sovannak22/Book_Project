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

      return back();
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
        $comment = Comment::all();
        return view('posts.show', compact(['post', 'comment']));
    }
    public function like($id)
    {

      $current = Carbon::now();
      $current = new Carbon();
      $post = Post::find($id);
      $post->users()->attach(Auth::user()->id, ['created_at' => $current, 'updated_at' => $current]);
      return back();
    }
    public function edit($id)
    {
      // code...
      $post = Post::find($id);

      return view('posts.edit_post', compact(['post']));
    }
    public function update(Request $request, $id)
    {
      // code...
      $post = Post::find($id);
      $post->description = $request->get('description');
      $post->save();

      return redirect('/');
    }
    public function destroy($id)
    {
      // code...
      $post = Post::find($id);
      $post->delete();

      return redirect('/')->with('success', 'Post has been deleted Successfully');
    }
}
