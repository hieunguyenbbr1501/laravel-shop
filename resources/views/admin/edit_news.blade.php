@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">News</a> <a href="#" class="current">Edit News</a> </div>
    <h1>News</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit News</h5>
          </div>
          <div class="widget-content nopadding">
          @include('flash_message')

            <form class="form-horizontal" method="post" action="{{ url('/admin/update-news/'.$news->id) }}" name="add_News" id="add_News" novalidate="novalidate" enctype="multipart/form-data"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" id="News_name">
                  <input type="hidden" name="url">
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
                  <input type="file" name="banner" id="image" required>
                </div>
              </div>               
              <div class="form-actions">
                <input type="submit" value="Edit News" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection