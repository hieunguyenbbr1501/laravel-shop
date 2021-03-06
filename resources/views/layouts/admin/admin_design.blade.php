<!DOCTYPE html>
<html lang="en">
<head>
<title>Laravel Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-media.css') }}" />
<link href="{{ asset('fonts/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/admin/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.admin.admin_header')

@include('layouts.admin.admin_sidebar')

@yield('content')

@include('layouts.admin.admin_footer')

<script src="{{ asset('js/admin/jquery.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/admin/matrix.js') }}"></script> 
<script src="{{ asset('js/admin/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/admin/matrix.tables.js') }}"></script>
<script src="{{ asset('js/admin/matrix.popover.js') }}"></script>

</body>
</html>
