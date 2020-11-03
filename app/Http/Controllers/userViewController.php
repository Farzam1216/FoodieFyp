<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        return view('userEnd.checkout');

    }

    public function contact()
    {   

        return view('userEnd.contact-us');

    }

    public function fastfood()
    {   

        return view('userEnd.fastfood');

    }

    public function indexx()
    {   

        return view('userEnd.index');

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

        return view('userEnd.shop-detail');

    }

    public function shop()
    {   

        return view('userEnd.shop');

    }

    public function traditional()
    {   

        return view('userEnd.traditional');

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
