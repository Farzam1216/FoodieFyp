<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Resturant;

use App\Models\Cart;

use App\Models\Checkout;

use App\Models\Order;

use App\Models\OrderItem;

use App\Models\User;

use App\Models\stripe;

use Auth;

use DB;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;

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

    public function newcategories($category_id)
    {
        $categories=Category::all();
        $products = Product::where(['foreignproductid'=>$category_id])->get();
        return view('userEnd.categories',compact('categories','products'));
    }

    public function productDetails($id)
    {
        $products = Product::where(['id'=>$id])->get();
        return view('productsDetails',compact('products'));
    }

    public function categoryDetails($id)
    {
        $category = Category::where(['id'=>$id])->get();
        return view('userEnd.categoryDetail',compact('category'));
    }

     public function resturantDetails($id)
    {
        $resturant = Resturant::where(['id'=>$id])->get();
        return view('userEnd.resturantDetail',compact('resturant'));
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

    public function stripe(){
        $user_email = Auth::user()->email;
        $order = Order::where(['useremail'=>$user_email])->first();
        return view('userEnd.stripe',compact('order'));
    }
    
    public function stripeStore(Request $request){
        $stripe=New stripe;
        $stripe->total=$request->input ('total');
        $stripe->name=Auth::User()->name;
        $stripe->card=$request->input ('card');
         // $stripe->store();
        return redirect('/thanks')->with('status' ,' Order Placed Successfully');
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



    public function myOrder()
    {
        $Order=Order::where(['username'=>Auth::User()->name])->get();
        
        return view('userEnd.myOrder',compact('Order'));
    }

    public function myOrderItem($id)
    {
        $ordersitem=OrderItem::where(['orderid'=>$id])->get();
        
        return view('userEnd.myOrderItem',compact('ordersitem'));
    }
   

    public function index()
    {
        //
        $resturants = Resturant::all();
        $categories = Category::all();
        $products = Product::all();
        $User=User::all();
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = Cart::where(['email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
        }
        return view('userEnd.index',compact('categories','resturants','products','cart','User'));
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
        // Password update at user end  //

        $name=Auth::user()->name;
        $role=Auth::user()->role;
        $mobile=Auth::user()->mobile;
        $user_email = Auth::user()->email;
        $user_password = Auth::user()->password;
        $user=User::where(['password'=>$request->input('oldpassword')])->get();
        $new=$request->input ('newpassword');
        $renew=$request->input ('reNewpassword');
        $old=$request->input('oldpassword'); 
            # code...
        if ($old ==  $user_password) {
            if ( $new == $renew) {
                # code...
                $user=new User;
                $user->name=$name;
                $user->email=$user_email;
                $user->mobile=$mobile;
                $user->password=$request->input ('newpassword');
                $user->update();
                 Session::flash('statuscode', 'success');
                return redirect('/')->with('status', 'Password Updated Successfully');
            }
        }
            else
                Session::flash('statuscode', 'success');
                return redirect('/')->with('status', 'Credentials doesnot match');
            
            // $user->save();
               
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

 