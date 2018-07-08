<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Management</title>
     @include('backend.partial.admin-style')
     @yield('style')

</head>
<body id="dashboard-body">
    @include('backend.partial.admin-sidebar')
    @include('backend.partial.admin-navbar')
       <div id="flash-msg">
                @include('flash::message')
        </div>
    @yield('content')
       
    @include('backend.partial.admin-footer')
    <!-- Scripts -->
    @include('backend.partial.admin-javascript')
    @yield('script')
</body>
</html>