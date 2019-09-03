@extends('layouts.user.user_design')

@section('content')
<div class="background-2-user">
<div class="floater-2-user" style="position:static;">
<h1>{{ $newsDetails->title }}<h1>
<img src="{{ asset('img/news/' .$newsDetails->banner) }}">
<h3>{{$newsDetails->sub}}</h3>
<p style="text-align:left">{{ $newsDetails->content }}</p>
</div>
</div>
@endsection

