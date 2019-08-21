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
    
    
}
