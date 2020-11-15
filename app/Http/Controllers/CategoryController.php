<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Models\Category;

use Image;

use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name')->paginate(20);
        return view('admin.Categories.list', compact('categories'));
        

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
            'status'=>'required',
            'image' => 'required',
        ]);
        $category = new Category;
        $category->name= $request->input ('name');
        $category->description= $request->input ('description');
        $category->status= $request->input ('status');

       if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Categories/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $category->image=$filename;
                }    
            }

  
        $category->save();

        Session::flash('statuscode' , 'success');
        return redirect('/category')->with('status' ,'CATEGORY ADDED SUCCESSFULLY ');
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
    public function update(Request $request, Category $category)
    {
        //
        // dd($request->all());
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Categories/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $category->image=$filename;
                }    
            }
            else{
                $filename=$request->input('current_image');
                $category->image=$filename;
            }
        
        $category->update();
        Session::flash('statuscode', 'success');
        return redirect('/category')->with('status', 'Category Updated Successfully');
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
        $category = Category::findorfail($id);
        $category->delete();

        return redirect('/category')->with('status', 'Category Deleted Successfully');

    }
}
