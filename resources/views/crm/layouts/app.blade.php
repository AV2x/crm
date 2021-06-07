<!doctype html>
<html lang="en">
<head>
    <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('source/css/style.css')}}">
</head>
<body>

<div class="wrapper d-flex align-items-stretch">

    @include('crm.layouts.navigation')

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        @include('crm.layouts.menu')


        @yield('content')


    </div>
</div>
<script src="{{asset('source/js/jquery.min.js')}}"></script>
<script src="{{asset('source/js/popper.js')}}"></script>
<script src="{{asset('source/js/bootstrap.min.js')}}"></script>
<script src="{{asset('source/js/main.js')}}"></script>
</body>
</html>
