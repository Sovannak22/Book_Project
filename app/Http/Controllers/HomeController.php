<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

=======
use Auth;
>>>>>>> 0c79cd23cf1c0fdc9c797fa3942bf88a68b21cbb
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
        $user=Auth::user();
        return view('home')->with('user',$user);
>>>>>>> 0c79cd23cf1c0fdc9c797fa3942bf88a68b21cbb
    }
}
