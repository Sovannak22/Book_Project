<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Follow;
use App\Model\Book;
use App\Model\Post;
use App\Model\Store;
use App\Model\Comment;
use Auth;
use App\User;
use Image;
use DB;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user =  User::find($id);
        $store = Store::where('user_id', $user->id)->first();
        // dd($store);
        $books = Book::all()->where('store_id',$store->id);
        // dd($books);
        $follower = Follow::where('user_id', $user->id)->count('follower_id');
        $following = Follow::where('follower_id', $user->id)->count('user_id');
        $posts = Post::all()->where('user_id', $user->id)->sortByDesc('created_at');
        $comment = Comment::all();

        // $books = Book::all();
        // $username =  \Auth::user()->name;
        // $follower = Follow::where('follower_id',Auth::user()->id)->count('user_id');
        // $following = Follow::where('user_id',Auth::user()->id)->count('follower_id');
        $followingNotCount = DB::table('follows')
        ->join('users','follows.user_id','users.id')
        ->where('follows.follower_id',Auth::user()->id)
        ->get();
        $followerUsers = DB::table('follows')
        ->join('users','follows.user_id','users.id')
        ->where('follows.user_id',Auth::user()->id)
        ->get();
        // dd($followingNotCount);
        // $posts = Post::all()->where('user_id',Auth::user()->id)->sortByDesc('created_at');
        // $comment = Comment::all();
        // return view('profile.CreateProfile',compact('username','follower','following','books','posts','comment','followingNotCount','followerUsers'));
        return view('profile.CreateProfile',compact('user','follower','following','books','posts','comment','followingNotCount','followerUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $user = User::find($id);
        // $user->profile_img = $request->get('profile_img');
        // $user->save();

        if($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300, 300)->save( public_path('/images/' . $filename ) );

            $user = user::find($id);
            $user->profile_img = $filename;
            $user->save();
        }
    //    return redirect('/profile');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filename="default.jpg";
        $user = user::find($id);
        $user->profile_img = $filename;
        $user->save();
        return redirect()->back();
    }
}
