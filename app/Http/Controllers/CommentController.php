<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use App\Model\Post;
use Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->description = $request->get('cmt-text');
        $comment->user()->associate(Auth::user()->id);
        $post = Post::find($request->get('post_id'));
        $comment->post_id=$post->id;
        $post->comments()->save($comment);

        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->description = $request->get('cmt-text');
        $reply->user()->associate(Auth::user()->id);
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $reply->post_id = $post->id;

        $post->comments()->save($reply);

        return back();

    }
}
