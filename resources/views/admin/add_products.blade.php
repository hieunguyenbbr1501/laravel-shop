@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Products</h1>
    
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
          @include('flash_message')

            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/insert-products') }}" name="add_product" id="add_product" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Brand</label>
                <div class="controls">
                  <select name="brand" id="brand" style="width: 220px;">
                  <option value='' selected disabled>Select</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->name}}">{{$brand->name}}</option>
                  @endforeach  
                    
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" required />
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Discount</label>
                <div class="controls">
                  <input type="text" name="discount" id="discount" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image" required />
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" value="Add Product" class="btn btn-success">Add Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection