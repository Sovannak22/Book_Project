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

class EditProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        return view('profile.EditProfile', compact('user'));
    }
    public function update(Request $request, $id)
	{
	      $request->validate([
	        'name'=>'required',
	      ]);

	      $user = User::find($id);
	      $user->name = $request->get('name');
		  $user->bio = $request->get('bio');
		  $user->email= $request->get('email');
	      $user->save();

	      return redirect('/profile');
	}
	public function create()
    {
      
    }

}
