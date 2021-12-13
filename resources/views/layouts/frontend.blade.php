<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CompanyManagement</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap_4.6.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/bootstrap.bundle_4.6.1.min.js') }}"></script>   
</head>
<body>  
    <div>
        @include('layouts.navbar');
        @yield('content');
    </div>
</body>

 
</html>