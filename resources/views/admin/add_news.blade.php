@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">News</a> <a href="#" class="current">Add News</a> </div>
    <h1>News</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add News</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/store-news') }}" name="add_News" id="add_News" novalidate="novalidate" enctype="multipart/form-data"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" id="News_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sub Title</label>
                <div class="controls">
                  <input type="text" name="sub" id="News_name" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Content</label>
                <div class="controls">
                <textarea name="content" required></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Banner</label>
                <div class="controls">
                  <input type="file" name="image" id="image" required>
                </div>
              </div>               
              <div class="form-actions">
                <input type="submit" value="Add News" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection