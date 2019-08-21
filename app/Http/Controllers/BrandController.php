<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function viewBrands(){
        $brands = Brand::get();
        return view('admin.view_brands')->with(compact('brands'));
    }
    public function addBrands(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $brand = new Brand;
            $brand->name = $data['name'];
            $brand->url  =str_slug($data['name'], "-");
            $brand->save();
            return back()->with('success', 'Brand has been added successfully');
        }
        return view('admin.add_brands');

    }
}
