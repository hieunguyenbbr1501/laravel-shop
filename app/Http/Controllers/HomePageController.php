<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Brand;
use Session;
class HomePageController extends Controller
{
    //
    public function index(){
        $productSlide = Product::inRandomOrder()->take(4)->get();
        return view('user.homepage');
    }
}
