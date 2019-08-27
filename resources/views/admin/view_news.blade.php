@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">News</a> <a href="#" class="current">View News</a> </div>
    <h1>Products</h1>
    
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View News</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>News ID</th>
                  <th>URL</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Banner</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($news as $n)
                <tr class="gradeX">
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->url }}</td>
                  <td>{{ $n->title }}</td>
                  <td>{{ $n->sub }}</td>
                  <td>
                    @if(!empty($n->banner))
                      <img src="{{ asset('/img/news/'.$n->banner) }}" style="width:60px;">
                    @endif
                  </td>
                  <td class="center"><a href="{{ url('/admin/edit-news/'.$n->id) }}" class="btn btn-primary btn-mini">Edit</a> <a id="delCat" href="{{ url('/admin/delete-news/'.$n->id) }}" class="btn btn-danger btn-mini">Delete</a> </td>
                </tr>
                <div id="myModal{{ $n->id }}" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>{{ $n->id }} Full Details</h3>
                      </div>
                      <div class="modal-body">
                        <p>Content: {{ $n->content }}</p>
                      </div>
                    </div>   
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection