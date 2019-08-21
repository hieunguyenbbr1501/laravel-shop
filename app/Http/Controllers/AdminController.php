<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Brand;
use Session;

class AdminController extends Controller
{
    //
    public function logout(){
        Session::flush();
        return redirect('/login');
    }
    /*
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user = User::where(['email'=>$data['email']])->get();
            $user  =json_decode($user);
            echo "pre";
            print_r($user);die;
                //Session::put('adminSession',$data['email']);
                //return redirect('admin/dashboard');
            }
                else{
                    echo "Failed";die;
                }
            //echo "<pre>";
            //print_r($data); die;
        
        return view('admin/login');
    }
    */
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
    public function viewBrands(){
        $brands = Brand::get();
        return view('view_brands')->with(compact('brands'));
    }
    public function getBrands(){

    }
}
