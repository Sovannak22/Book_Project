<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Book;
use Auth;
use App\Model\Cart;
class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function create_cart(){
        $cart=new Cart;
        $cart->user_id=Auth::user()->id;
        $cart->save();
        return redirect('/');
    }
    public function show(){
        $cart_id = Auth::user()->cart->id;

        $cart_id = Auth::user()->cart->id;
        $books = Cart::find($cart_id)->books;
        // dd($books);
        return view('carts.show')->with('books',$books);

    }

    public function addBookToCart(Request $request){
        $book_id = $request->get("book_id");
        $cart_id = Auth::user()->cart->id;
        $bookInCart = Cart::find($cart_id)->books;
        foreach ($bookInCart as $book){
            if ($book_id==$book->id){
                return 'have';
            }
        }
        DB::table('book_cart')->insert(
            ['cart_id' => $cart_id, 'book_id' => $book_id]
        );
        return 'success';
    }
}
