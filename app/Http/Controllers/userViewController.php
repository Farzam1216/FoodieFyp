<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Resturant;

use App\Models\Cart;

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
        return view('userEnd.index',compact('categories','resturants','products'));

    }
     public function master()
    {   
        $resturants = Resturant::all();
        $categories = Category::all();
        return view('userEnd.layouts.master',compact('categories','resturants'));

    }


    public function about()
    {   

        return view('userEnd.about');

    }

    public function cart()
    {   

        return view('userEnd.cart');

    }

    public function checkout()
    {   
        $cart = Cart::all();
        return view('userEnd.checkout',compact('cart'));

    }

    public function contact()
    {   

        return view('userEnd.contact-us');

    }

    public function fastfood()
    {   

        return view('userEnd.fastfood');

    }

    

    public function juices()
    {   

        return view('userEnd.jucies');

    }

    public function myaccount()
    {   

        return view('userEnd.my-account');

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

        return view('userEnd.shop');

    }

    public function traditional()
    {   
        $category = Category::all();
        $products = Product::where(['foreignproductid' => 1])->get();
        $cart = Cart::all();
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

 