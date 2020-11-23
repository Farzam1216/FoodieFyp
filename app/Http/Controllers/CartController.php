<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Category;

use App\Models\Cart;

use App\Models\User;

use Auth;

use DB;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        $products = Product::all();
        
        return view('userEnd.cart',compact('products','cart'));
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
        if(empty(Auth::user()->email)){
            $data['user_email'] = '';
        }else{
            $data['user_email'] = Auth::user()->email;
            $user_email = Auth::user()->email;
        }

        $session_id = Session::get('session_id');
        if(empty($session_id)){
        $session_id = str_random(40);
        Session::put('session_id',$session_id);
        }


        $cart = new Cart;
        $cart->name= $request->input ('name');
        $cart->price= $request->input ('price');
        $cart->quantity= $request->input ('quantity');
        $cart->session_id=$session_id;
        $cart->email=$user_email;

        $cart->save();

        Session::flash('statuscode' , 'success');
        return redirect('/cart')->with('status' ,' ADDED TO CART SUCCESSFULLY ');
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
    public function update(Request $request, Cart $cart)
    {
        //
        $cart->quantity = $request->input('quantity');
       
        $cart->update();
        Session::flash('statuscode', 'success');
        return redirect('/cart')->with('status', 'Product Quantity Updated Successfully');
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
        $cart = Cart::findorfail($id);
        $cart->delete();
        Session::flash('statuscode', 'danger');
        return redirect('/cart')->with('dstatus', 'Cart Deleted Successfully');
    }
}
