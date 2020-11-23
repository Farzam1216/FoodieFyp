<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Resturant;

use App\Models\Cart;

use App\Models\Checkout;

use Auth;

use DB;

use Illuminate\Support\Facades\Session;

class userViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexx()
    {   
        $resturants = Resturant::all();
        $categories = Category::all();
        $products = Product::all();
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.index',compact('categories','resturants','products','cart'));

    }
     public function master()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        $resturants = Resturant::all();
        $categories = Category::all();
        return view('userEnd.layouts.master',compact('categories','resturants','cart'));

    }


    public function about()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.about',compact('cart'));

    }

    public function categories()
    {
        $categories=Category::all();
        $products=Product::all();
        return view('userEnd.categories',compact('categories','products'));
    }

    public function productDetails($id)
    {
        $products = Product::where(['id'=>$id])->get();
        return view('productsDetails',compact('products'));
    }

     public function newcategories($category_id)
    {
        $categories=Category::all();
        $products = Product::where(['foreignproductid'=>$category_id])->get();
        return view('userEnd.categories',compact('categories','products'));
    }
    
    

    public function checkout()
    {   
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.checkout',compact('cart'));

    }

    public function contact()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.contact-us',compact('cart'));

    }

    public function fastfood()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.fastfood',compact('cart'));

    }

    

    public function juices()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.jucies',compact('cart'));

    }

    public function thanks()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.thanks',compact('cart'));

    }

    public function myaccount()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.my-account',compact('cart'));

    }

    public function orderreview()
    {

        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        $checkout=Checkout::where(['email'=>$user_email])->get();
        return view('userEnd.orderreview',compact('cart','checkout'));
    }

    public function service()
    {   

        return view('userEnd.service');

    }

    public function shopdetail()
    {   
        $resturants = Resturant::all();
        return view('userEnd.shop-detail',compact('resturants'));

    }

    public function shop()
    {   
         if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.shop',compact('cart'));

    }

    public function traditional()
    {   
        $category = Category::all();
        $cat=new Category;
        $cart = Cart::all();
        // $products = DB::table('products')->whereColumn('foreignproductid', 'foreignproductid')->get();
        $products = Product::where(['foreignproductid'=>1])->get();
        
        return view('userEnd.traditional',compact('products','category','cart'));

    }

    public function wishlist()
    {   

        return view('userEnd.wishlist');

    }

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

 