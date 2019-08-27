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
        return view('admin.add_brands');

    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required'
        ]);
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
    public function update(Request $request, $id){
        $data = $request->validate([
            "name"=>"required"
        ]);
        if(Brand::where('id',$id)->update(['name'=>$data['name'],'url'=>str_slug($data['name'], "-")])){
            return back()->with('success', 'Brand info has been edited');
        }
        
        
    }
}
