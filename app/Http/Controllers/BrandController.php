<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function viewBrands(){
        $brands = Brand::get();
        return view('admin.view_brands')->with(compact('brands'));
    }
    public function addBrands(Request $request){
        return view('admin.add_brands');

    }
    public function store(BrandRequest $request){
        $data = $request->all();
        $brand = new Brand;
        $brand->name = $data['name'];
        $brand->url  =str_slug($data['name'], "-");
        if( $brand->save()){
            return back()->with('success', 'Brand has been added successfully');
        }
        else{
            return back()->with('error', 'Couldnt add a new brand');
        }
        
    }
    public function deleteBrands($id){
        if(Brand::where(['id'=>$id])->delete()){
            return back()->with('info', 'Brand has been removed');
        }
    }
    public function editBrands($id = null){
        $brandDetails = Brand::where('id', $id)->first();
        return view('admin.edit_brands')->with(compact('brandDetails'));
    }
    public function update(BrandRequest $request, $id){
        $data = $request->all();
        if(Brand::where('id',$id)->update(['name'=>$data['name'],'url'=>str_slug($data['name'], "-")])){
            return back()->with('success', 'Brand info has been edited');
        }
        else{
            return back()->with('error', 'Couldnt delete the brand');
        }
        
    }
    public function show($url){
        $brandDetails = Brand::with('products')->where('url', $url)->first();
        $products = Product::where('brand', $brandDetails->name)->get();
        return view('user.view_brand')->with(compact('brandDetails','products'));
    }
}
