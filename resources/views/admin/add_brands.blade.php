@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">Add Brand</a> </div>
    <h1>Brands</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Brand</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/insert-brands') }}" name="add_Brand" id="add_Brand" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Brand Name</label>
                <div class="controls">
                  <input type="text" name="name" id="Brand_name">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Brand" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection