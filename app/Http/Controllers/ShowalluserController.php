<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Follow;
use App\Model\Book;
use App\Model\Post;
use App\Model\Comment;
use Auth;
use App\User;
use Image;
use DB;
class ShowalluserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd(Auth::user()->id);
        // $follows = Follow::all();
        $follows = DB::table('follows')
            ->join('users','follows.user_id','users.id')
            ->where('users.id',Auth::user()->id)
            ->get();
        // dd($follows);
        return view('Show_user.ShowAllUser', compact('users','follows'));
    }
    public function follow()
    {
        
    }
}