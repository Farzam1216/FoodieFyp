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

use Illuminate\Support\Facades\Session;

use Auth;

class AdminOrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ordersitem=OrderItem::all();
        return view('admin.Orders.orderitem',compact('ordersitem'));
    }

    public function indexx($id)
    {
        //

        $ordersitem=OrderItem::where(['orderid'=>$id])->get();
        
        return view('admin.Orders.item',compact('ordersitem'));
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
    public function update(Request $request, $OrderItem )
    {
        //
        $item = OrderItem::findorfail($OrderItem);
        $item->orderid=$request->input ('orderid');
        $item->userName=$request->input ('userName');
        $item->userEmail=$request->input ('userEmail');
        $item->name=$request->input ('name');
        $item->price=$request->input ('price');
        $item->quantity=$request->input ('quantity');
        $item->totalPrice=$request->input ('totalPrice');
        $item->grandTotal = $request->input ('grandTotal');     
        $item->update();
        Session::flash('statuscode' , 'success');
        return redirect('/item/'.$item->orderid)->with('status' ,' Order Item Updated Successfully');
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
        $orderitem = OrderItem::findorfail($id);
        $orderitem->delete();

        return redirect('/orderitem')->with('status', 'Order Deleted Successfully');
    }
}
