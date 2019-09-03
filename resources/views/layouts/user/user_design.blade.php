<!DOCTYPE html>
<title> </title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <title>Document</title>
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">


</head>

<body>
<div class="content">
@include('layouts.user.user_header')

@yield('content')

@include('layouts.user.user_footer')
</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        /*
         * Open the drawer when the menu ison is clicked.
         */
    </script>
</body>

</html>