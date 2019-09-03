@extends('layouts.user.user_design')

@section('content')
<div class="background-2-user">
<div class="floater-2-user" style="position:static;">
<h1>{{ $productDetails->name }}<h1>
<img src="{{ asset('img/products/' .$productDetails->image) }}">
<h3>{{$productDetails->brand}}</h3>
<p style="text-align:left"><del>${{ $productDetails->price }}</del></p>
<p style="text-align:left"><strong>${{ $productDetails->price*(1-$productDetails->discount/100) }}</strong></p>
</div>
</div>
@endsection

