<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Input;
use App\News;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Product;
use App\Brand;
use Session;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::get();
        return view('admin.view_news')->with(compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        //
        $data = $request->all();
        $news = new News;
        $news->title = $data['title'];
        $news->url = str_slug($data['title'], "-");
        $news->sub = $data['sub'];
        $news->content = $data['content'];
        //echo "<pre>"; print_r($data); die;
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().rand(10,99).'.'.$extension;
                $data['image']  =$filename;
                $image_path = 'img/news/'.$filename;
                if(!Image::make($image_tmp)->save($image_path)){
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in products table
                
            }

        }
        $news->banner = $filename;
        //echo "<pre>"; print_r($data); die;
        if($news->save()){
            return back()->with('success', 'News has been created');
        }
        else{
           return back()->with('error', 'Failed');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //
        $newsDetails = News::where('url', $url)->first();
        if(!$news){
            return back()->with('error', 'Cannot find the specific news');
        }
        return view('user.view_news')->with(compact('newsDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        //
        $news = News::where('id', $id)->first();
        if(!$news){
            return back()->with('error', 'Cannot find the specific news');
        }
        return view('admin/edit_news')->with(compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id = null)
    {
        //
        $data = $request->all();
        $data['url'] = str_slug($data['title'], "-");
        if($request->hasFile('banner')){
            $image_tmp = $request->file('banner');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = 'news'.time().rand(10,99).'.'.$extension;
                $image_path = 'img/news/'.$filename;
                try{
                    if(!Image::make($image_tmp)->save($image_path)){
                        throw new Exception();
                    }
                // Store image name in products table
                $data['banner'] = $filename;
                }
                catch (Exception $e){
                    return back()->with('error', 'Something was wrong, please try again');
                }
            }
        }
        if(News::where('id', $id)->update($data)){
            return back()->with('success', 'News has been updated');
        }
        else{
            return back()->with('error', 'Failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        //
        if(News::where('id', $id)->delete()){
            return back()->with('info', 'News has been deleted');
        }
        else{
            return back()->with('error', 'Couldnt delete the news');
        }
        
    }
}
