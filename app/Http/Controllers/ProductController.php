<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Category;

use Image;

use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product =Product::all();
        $categories =Category::all();
        return view('admin.Products.add', compact('categories','product'));
        
    }

    public function list()
    {
        $product =Product::all();
        $categories =Category::all();
        return view('admin.Products.list', compact('categories','product'));

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
         $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',  
            
        ]);
        $product = new Product;
        $product->foreignproductid= $request->input ('foregin');
        $product->name= $request->input ('name');
        $product->description= $request->input ('description');
        $product->price= $request->input ('price');
        $product->units= $request->input ('units');
        $product->quantity= $request->input ('quantity');
         if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Products/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image=$filename;
                }    
            }

        $product->save();

        Session::flash('statuscode' , 'success');
        return redirect('/listProducts')->with('status' ,'Product Added Successfully ');
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
    public function update(Request $request, Product $product)
    {
        //
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->foreignproductid = $request->input('foregin');
        $product->units = $request->input('units');
         if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Products/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image=$filename;
                }    
            }
            else{
                $filename=$request->input('current_image');
                $product->image=$filename;
            }

        $product->update();
        Session::flash('statuscode', 'success');
        return redirect('/listProducts')->with('status', 'Product Updated Successfully');
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
        $product = Product::findorfail($id);
        $product->delete();

        return redirect('/listProducts')->with('status', 'Product Deleted Successfully');
    }
}
