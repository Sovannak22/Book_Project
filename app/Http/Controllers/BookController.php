<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Category;
use App\Model\Book;
use App\Model\Store;
use App\Model\Condition;
use App\Model\ForModel;
use App\Model\Sold;
use Image;
use Illuminate\Support\Facades\DB;
use View;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','booksCategory','search']]);
        $categories = Category::orderBy('category','asc')->get();
        $conditions = Condition::all();
        $fors = ForModel::all();
        View::share('categories', $categories);
        View::share('conditions', $conditions);
        View::share('fors', $fors);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index')->with('books',$books);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->has_store==1){
            $conditions = Condition::all();
            $fors = ForModel::all();
            return view('books.create');
        }
        else{
            return redirect('missstore')->withErrors(['You need to create store for your account first']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = 'default.jpg';
        $store_id = Auth::user()->store->id;
        $book = new Book([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'description' => $request->get('description'),
            'book_img' => $img,
        ]);
        $book->for_id=$request->get('for');
        $book->condition_id=$request->get('condition');
        $book->price=$request->get('price');
        if($request->hasFile('book_img')){
            $book_img = $request->file('book_img');
            $fileName = time().'.'.$book_img->getClientOriginalExtension();
            Image::make($book_img)->resize(250,350)->save(public_path('/storage/book_img/'.$fileName));
            $book->book_img=$fileName;
        }
        $book->store_id=$store_id;
        $book->save();
        $book->categories()->sync($request->get('categories'));
        return redirect("/managestore/{$store_id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        $store=$book->store;
        $data=array(
            'book'=>$book,
            'store'=>$store
        );
        return view('books.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        
        return view('books.edit')->with('book',$book);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $store_id = Auth::user()->store->id;
        $book->title=$request->get('title');
        $book->author=$request->get('author');
        $book->description=$request->get('description');
        $book->for_id=$request->get('for');
        $book->condition_id=$request->get('condition');
        $book->price=$request->get('price');
        if($request->hasFile('book_img')){
            $book_img = $request->file('book_img');
            $fileName = time().'.'.$book_img->getClientOriginalExtension();
            Image::make($book_img)->resize(250,350)->save(public_path('/storage/book_img/'.$fileName));
            $book->book_img=$fileName;
        }
        $book->store_id=$store_id;
        $book->save();
        DB::table('book_category')->where('book_id', $id)->delete();
        $book->categories()->sync($request->get('categories'));
        return redirect("/managestore/{$store_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return 'success';
    }

    public function erroMissingStore(){
        return view('books.create_store');
    }

    public function search(Request $request){
        $searchData = $request->searchBook;
        $books = DB::table('books')
            ->where('title','like','%'.$searchData.'%')
            ->get();
        return view('books.index')->with('books',$books);
    
    }

    public function booksCategory(Request $request){
        $category_id = $request->get("cat_id");
        if($category_id==0){
            $books = Book::all();
        }
        else{
            $books = DB::table('books')
                ->join('book_category','books.id','book_category.book_id')
                ->join('categories','categories.id','book_category.category_id')
                ->where('categories.id',$category_id)
                ->get();
        }
        return view('books.book_cat_show')->with('books',$books);
    }

    public function buyBook(Request $request){
        $book_id = $request->get("book_id");
        $store_id = Book::find($book_id)->store->id;
        $buyer_id = Auth::user()->id;
        $sold = new Sold;
        $sold->book_id=$book_id;
        $sold->store_id=$store_id;
        $sold->buyer_id = $buyer_id;
        $sold->save(); 
        // DB::table('solds')->insert(
        //     ['store_id' => $store_id, 'book_id' => $book_id,'buyer_id'=>$buyer_id]
        // );
        return 'success';
    }
}
