<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Brands</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-brands') }}">Add Brand</a></li>
        <li><a href="{{ url('/admin/brands') }}">View Brands</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-products') }}">Add Product</a></li>
        <li><a href="{{ url('/admin/products') }}">View Products</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">1</span></a>
      <ul>
      <li><a href="{{ url('/admin/orders') }}">View Orders</a></li>
      </ul>
    </li>
    
   
  </ul>
</div>
<!--sidebar-menu-->