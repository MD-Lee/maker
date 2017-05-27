<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/weui.css"/>
    <link rel="stylesheet" href="/css/weui2.css"/>
    <link rel="stylesheet" href="/css/weui3.css"/>
    <link rel="stylesheet" href="/css/icon.css"/>
</head>
<body>


    @yield('content')



</body>

<script src="/js/jQuery-2.1.4.min.js"></script>
@yield('my-js')
</html>
