<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Resturant;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Checkout;

use DB;

use Auth;

use Illuminate\Support\Facades\Session;

class OrderController extends Controller
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
            $Cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
            $Cart = Cart::where(['session_id'=>$session_id])->get();
        }
        
        $checkout=Checkout::where(['email'=>$user_email])->get();
        return view('userEnd.orderreview',compact('Cart','cart','checkout'));
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

        $orders =new Order;
        $orders->username = $request->input ('username');
        $orders->useremail = $request->input ('useremail');
        $orders->useraddress = $request->input ('useraddress');
        $orders->usercountry = $request->input ('usercountry');
        $orders->usercity = $request->input ('usercity');
        $orders->userzip = $request->input ('userzip');
        $orders->usertotal = $request->input ('usertotal');

        $orders->itemname = $request->input ('itemname');
        $orders->itemprice = $request->input ('itemprice');
        $orders->itemquantity = $request->input ('itemquantity');
        $orders->itemtotal = $request->input ('itemtotal');
        
        $orders->save();

       
        DB::table('carts')->where('email' , $orders->useremail)->delete();
 
        Session::flash('statuscode' , 'success');
        return redirect('/thanks')->with('status' ,' Billing Address Added Successfully');
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
    
}
