@extends('layouts.user.user_design')
@section('content')
<div class="background-2">
<h1 style="text-align:center;">{{ $brandDetails->name }}</h1>
<div class = "background-3-news-container" style="margin-top:100px;">
@foreach($products as $product)

<div class="background-3-news-item">
                            <a href="#">
                                <img src="{{ asset('img/products/'.$product->image) }}" style="object-fit:contain;height:228.24px;" alt="">
                            </a>
                            <div class="background-3-news-item-index-container" style="">
                                <div class="background-3-news-item-index">
                                    <a href="#">
                                        <h2>{{ $product->name }}</h2>
                                    </a>
                                    <p class="index-subheader" style="color: rgb(168, 168, 168);">{{ $product->brand }}</p>
                                    <p class="index-description"><del>{{ $product->price }}</del></p>
                                    <p class="index-description"><strong>{{ $product->price*(1-$product->discount/100) }}</strong></p>
                                    <div class="background-3-news-item-button">
                                        <button class="btn"><a href="#">Buy</a></button>
                                        <div class="background-3-news-item-icons">
                                            <div class="vertical-border" style="border-right:solid 0.5px;border-color: gray"><a href="#" class="heart"><i class="fas fa-heart"></i></a></div>
                                            <div><a href="#"><i class="fas fa-comment"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endforeach
</div>
</div>
@endsection