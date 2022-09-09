<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('frontend/home',compact('products'));
    }
}
