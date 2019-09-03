<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
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
    public function addProducts(){
        $brands = Brand::get();
    	//$brands_dropdown = "<option value='' selected disabled>Select</option>";
    	//foreach($brands as $brand){
    	//	$brands_dropdown .= "<option value='".$brand->id."'>".$brand->name."</option>";
        //}
    	
        return view('admin/add_products')->with(compact('brands'));
    }
    public function deleteProducts($id = null){
        if(Product::where(['id'=>$id])->delete()){

            return back()->with('info', 'Product has been deleted');
        }
        else{
            return back()->with('failed', 'Couldnt delete the product');
        }
    }
    public function editProducts($id = null){
        $brands = Brand::get();
        $productDetails = Product::where('id', $id)->first();
    	//$brands_dropdown = "<option value='' selected disabled>Select</option>";
    	//foreach($brands as $brand){
    	//	$brands_dropdown .= "<option value='".$brand->id."'>".$brand->name."</option>";
        //}
        return view('admin.edit_products')->with(compact('brands','productDetails'));
    }
    public function updateProducts($id = null, Request $request){
        $data = array_filter($request->only('name', 'brand', 'code', 'color', 'price', 'discount'));
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().rand(10,99).'.'.$extension;
                $data['image']  =$filename;
                $image_path = 'img/products/'.$filename;
                if(!Image::make($image_tmp)->save($image_path)){
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in products table
            }
            if(Product::where('id', $id)->update($data)){
                return redirect()->back()->with('success', 'Product info has been updated');
            }
            else{
                return redirect()->back()->with('failed','Cannot update product info');
            }
            
        }
    }
    public function insertProducts(ProductRequest $request){
        $data = $request->all();
            $product = new Product;
            $product->name = $data['product_name'];
            $product->code = $data['product_code'];
            $product->color = $data['product_color'];
            $product->brand = $data['brand'];
            $product->price = $data['price'];
            $product->discount = $data['discount'];
            if($request->hasFile('image')){
    			$image_tmp = $request->file('image');
    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = time().rand(10,99).'.'.$extension;
    				$image_path = 'img/products/'.$filename;
    				if(!Image::make($image_tmp)->save($image_path)){
                        return back()->with('error', 'Something was wrong with image');
                    }
    				// Store image name in products table
    				$product->image = $filename;
    			}
            }
            if($product->save()){
                return redirect()->back()->with('success', 'Product has been added!');
            }
            else return redirect()->back()->with('failed', 'Coudnt add a new product, please try agian');
    }
    public function show($code){
        $productDetails  = Product::where('code', $code)->first();
        $relatedProducts = Product::where('brand', $productDetails->brand)->orderBy('id','desc')->take(4)->get();
        return view('user.view_product')->with(compact('productDetails', 'relatedProducts'));
    }
}
