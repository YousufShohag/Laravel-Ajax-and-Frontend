<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/pages/products/addProduct');
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
    public function store(Request $request){

        $valid = Validator::make($request->all(),[
            'name'=>'required',
            'category_name'=>'required',
            'category_name'=>'required',
            'brnad_name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'status'=>'required'
        ]);
        if($valid->fails()){
            return response()->json([
                'status'=>'faild',
                'errors'=>$valid->getMessageBag()
            ]);
        }
     
        if ($request->image) {
            $images = $request->file('image');
            $customName = rand().".".$images->getClientOriginalExtension();
            $location = public_path('backend/product/'.$customName);
            Image::make($images)->save($location);
           
        }
        $products = new Product();
        $products->name = $request->name;
        $products->category_name = $request->category_name;
        $products->brnad_name = $request->brnad_name;
        $products->description = $request->description;
        $products->image =  $customName;
        $products->status = $request->status;
        $products->save();
        return response()->json([
            'sucess'=>'ok'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $products = Product::all();
        return response()->json([
            'data'=>$products
        ]);
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletes = Product::find($id);
        if (File::exists('backend/product/'.$deletes->image)) {
                File::delete('backend/product/'.$deletes->image);
            }
            $deletes->delete();
            return response()->json([
            'status'=>'success'
        ]);
    }

    public function manage(){
        return view('backend/pages/products/manage');
    }


    public function status($id){
        $status = Product::find($id);
        if ($status->status==1) {
           $status->status=2;
        }
        else{
            $status->status=1;
        }
        $status->update();
        return response()->json([
            'status'=>'success'
        ]);
    }

    public function updateshow($id){
        $showproduct = Product::find($id);
        return response()->json([
            'data'=>$showproduct
        ]);
    }


    public function update(Request $request, $id){
        $products = Product::find($id);
        if ($request->image) {
            if (File::exists('backend/product/'.$products->image)) {
                File::delete('backend/product/'.$products->image); 
                $images = $request->file('image');
                $customName = rand().".".$images->getClientOriginalExtension();
                $location = public_path('backend/product/'.$customName);
                Image::make($images)->save($location);
                $products->image =$customName ;
            }
           
           
        }

            $products->name = $request->name;
            $products->category_name = $request->category_name;
            $products->brnad_name = $request->brnad_name;
            $products->description = $request->description;
            //$products->image = $customName;
            $products->status = $request->status;
            $products->update();
            return response()->json([
            'status'=>'success'
        ]);
    }


    
}
