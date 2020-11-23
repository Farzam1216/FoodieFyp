<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Category;

use App\Models\Cart;

use App\Models\User;

use App\Models\Checkout;

use Auth;

use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
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
        $checkout=Checkout::where(['email'=>$user_email])->get();
        return view('userEnd.checkout',compact('cart','checkout'));

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

        if(empty(Auth::user()->name)){
            $data['user_name'] = '';
        }else{
            $data['user_name'] = Auth::user()->name;
            $user_name = Auth::user()->name;
        }

       
        

        $check = new Checkout;
        $check->name= $user_name;
        $check->email= $user_email;
        $check->address= $request->input ('address');
        $check->country= $request->input ('country');
        $check->city= $request->input ('city');
        $check->zip= $request->input ('zip');

        $check->save();

        Session::flash('statuscode' , 'success');
        return redirect('/checkout')->with('status' ,' Billing Address Added Successfully');

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

            
            $check = Checkout::find($id);
            $check->address= $request->input ('address');
            $check->country= $request->input ('country');
            $check->city= $request->input ('city');
            $check->zip= $request->input ('zip');
            
            $check->update();

            Session::flash('statuscode' , 'success');
            return redirect('/checkout')->with('ustatus' ,' Billing Address Updated Successfully');
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
