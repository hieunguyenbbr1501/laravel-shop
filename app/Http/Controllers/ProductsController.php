<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Brand;
use Session;

class ProductsController extends Controller
{
    
    public function viewProducts(){
        $products = Product::get();
        return view('admin.view_products')->with(compact('products'));
    }
    public function addProducts(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $product = new Product;
            $product->name = $data['product_name'];
            $product->code = $data['product_code'];
            $product->color = $data['product_color'];
            $product->brand = $data['brand'];
            $product->price = $data['price'];
            $product->discount = $data['discount'];
            if($request->hasFile('image')){
    			$image_tmp = Input::file('image');
    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$image_path = 'img/'.$filename;
    	

    				Image::make($image_tmp)->save($image_path);
    

    				// Store image name in products table
    				$product->image = $filename;
    			}
            }
            $product->save();
            return view('admin/add_product')->with('success', 'Product has been added!');
        }
        $brands = Brand::get();
    	$brands_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($brands as $brand){
    		$brands_dropdown .= "<option value='".$brand->id."'>".$brand->name."</option>";
        }
    	
        return view('admin/add_products')->with(compact('brands_dropdown'));
    }
}
