<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function viewBrands(){
        $brands = Brand::get();
        return view('view_brands')->with(compact('brands'));
    }
    public function addBrands(Request $request){

    }
}
