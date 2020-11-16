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

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders=Order::all();
        return view('admin.Orders.list',compact('orders'));
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
    public function update(Request $request, Order $order)
    {
        //

        $order->username = $request->input ('username');
        $order->useremail = $request->input ('useremail');
        $order->useraddress = $request->input ('useraddress');
        $order->usercountry = $request->input ('usercountry');
        $order->usercity = $request->input ('usercity');
        $order->userzip = $request->input ('userzip');
        $order->usertotal = $request->input ('usertotal');
        
        $order->update();
        Session::flash('statuscode' , 'success');
        return redirect('/order')->with('status' ,' Order Updated Successfully');

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
        $order = Order::findorfail($id);
        $order->delete();

        return redirect('/order')->with('status', 'Order Deleted Successfully');
    }
}
