<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Resturant;

use App\Models\Cart;

use App\Models\Order;

use App\Models\OrderItem;

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
        $orders->paymentmethod = $request->input ('payment_method'); 
        $orders->save();
        $cartitems= DB::table('carts')->where(['email'=>$orders->useremail])->get();
       
        foreach ($cartitems as $key => $items){
            # code...
        $ordersitems= new OrderItem;
        $ordersitems->orderid=$orders->id;
        $ordersitems->userName=$orders->username;
        $ordersitems->userEmail=$orders->useremail;
        $ordersitems->name=$items->name;
        $ordersitems->price=$items->price;
        $ordersitems->quantity=$items->quantity;
        $ordersitems->totalPrice=$items->price * $items->quantity;
        $ordersitems->grandTotal = $request->input ('usertotal');        
        
        $ordersitems->save();
        }
        DB::table('checkouts')->where('email' , $orders->useremail)->delete();
        DB::table('carts')->where('email' , $orders->useremail)->delete();
        if($orders->paymentmethod == 'cod'){
        Session::flash('statuscode' , 'success');
        return redirect('/thanks')->with('status' ,' Order Placed Successfully');
        }
        else
        return redirect('/stripe');
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
