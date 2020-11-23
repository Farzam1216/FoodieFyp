<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resturant;

use Illuminate\Support\Facades\Session;

use Image;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resturant = Resturant::all();
        return view('admin.Resturants.list',compact('resturant'));
    }
    public function add()
    {
        return view('admin.Resturants.add');
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
            'image'=>'required',
        ]);
        $resturant = new Resturant;
        $resturant->name= $request->input ('name');
        $resturant->description= $request->input ('description');
        $resturant->status= $request->input ('status');
         if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Resturants/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $resturant->image=$filename;
                }    
            }

        $resturant->save();

        Session::flash('statuscode' , 'success');
        return redirect('/resturant')->with('status' ,'RESTURANT ADDED SUCCESSFULLY ');
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
    public function update(Request $request, Resturant $resturant)
    {
        //
        $resturant->name = $request->input('namee');
        $resturant->description = $request->input('descriptionn');
        $resturant->status = $request->input('statuss');

        if ($request->hasfile('image')) {
                # code...
                echo $img_tmp=$request->file('image');
                if ($img_tmp->isValid()) {
                    # code...
                

                //image path code

                $extension=$img_tmp->getClientOriginalExtension();
                $filename=rand(111,999999).'.'.$extension;
                $img_path=public_path('Uploadimages/Resturants/' . $filename);

                //image resize

                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $resturant->image=$filename;
                }    
            }
            else{
                $filename=$request->input('current_image');
                $resturant->image=$filename;
            }

        $resturant->update();
        Session::flash('statuscode', 'success');
        return redirect('/resturant')->with('status', 'Resturant Updated Successfully');
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
        $resturant = Resturant::findorfail($id);
        $resturant->delete();

        return redirect('/resturant')->with('status', 'Resturant Deleted Successfully');
    }
}
