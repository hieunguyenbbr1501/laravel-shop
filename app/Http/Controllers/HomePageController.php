<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Brand;
use App\News;
use Session;
class HomePageController extends Controller
{
    //
    public function index(){
        $productSlides = Product::inRandomOrder()->take(4)->get();
        $news = News::orderBy('id', 'desc')->take(3)->get();
        return view('user.homepage')->with(compact('productSlides', 'news'));
    }
}
