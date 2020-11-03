<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

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
        $categories = Category::orderBy('name', 'asc')->paginate(20);
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
        ]);
        $category = new Category;
        $category->name= $request->input ('name');
        $category->description= $request->input ('description');
        $category->status= $request->input ('status');

        $category->save();

        Session::flash('statuscode' , 'success');
        return redirect('/category')->with('status' ,'CATEGORY ADDED ');
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

        $category->save();
        Session::flash('statuscode', 'success');
        return redirect('/category')->with('status', 'Category has been updated');
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

        return redirect('/category')->with('status', 'Category has been deleted');

    }
}
