<?php

namespace App\Http\Controllers;

use App\Model\Store;
use App\Model\Book;
use Illuminate\Http\Request;
use Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::all();
        return view('stores.index')->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        
        return view('stores.create')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = new Store([
            'store_description'=> $request->get('description'),
            'store_type_id' => '1',
        ]);
        $store->store_name = $request->get('store_name');
        $store->address = $request->get('address');
        $store->email = $request->get('email');
        $store->phone_number = $request->get('phone_number');
        $user=Auth::user();
        $store->user_id = $user->id;
        $user->has_store=1;
        $store->save();
        $user->save();
        return redirect('stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        $books = $store->books;
        // dd($books);

        return view('stores.show')->with(['store'=>$store,'books'=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage($id){

        if (Auth::user()->has_store==1){
            $bookInStore=count(Store::find($id)->books);
            $bookSide=0;
            if ($bookInStore > 0){
                $bookPercentage=($bookInStore)/(Store::find($id)->store_type->amount);
                $books=Store::find($id)->books;
                if ($bookPercentage>0.1){
                    $bookSide=round($bookPercentage/$bookPercentage);
                }
                $data=array(
                    'store' => (Store::find($id)),
                    'bookSide' => $bookSide,
                    'books' => $books,
                    
                );
                return view('stores.manage')->with($data);
            }
            $data=array(
                'store' => (Store::find($id)),
                'bookSide' => $bookSide,
                
            );
            return view('stores.manage')->with($data);
        }
        else{
            return redirect('missstore')->withErrors(['You need to create store for your account first']);
        }
    }
    public function edit($id)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
