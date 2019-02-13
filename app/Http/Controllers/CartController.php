<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Book;
use Auth;
class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        $cart_id = Auth::user()->cart->id;

        $books = DB::table('carts')
            ->join('book_cart','carts.id','book_cart.cart_id')
            ->join('books','books.id','book_cart.book_id')
            ->where('carts.id',$cart_id)
            ->get();
        return view('carts.show')->with('books',$books);

    }

    public function addBookToCart(Request $request){
        $book_id = $request->get("book_id");
        $cart_id = Auth::user()->cart->id;
        DB::table('book_cart')->insert(
            ['cart_id' => $cart_id, 'book_id' => $book_id]
        );
        return 'success';
    }
}