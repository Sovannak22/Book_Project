<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct() {
      return $this->middleware('auth');
    }
    public function create() {
      return view('post');
    }
    public function store(Request $request) {
      
    }
}
