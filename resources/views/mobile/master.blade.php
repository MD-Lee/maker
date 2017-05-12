<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/weui.css">

</head>
<body>

<div class="page">
    @yield('content')
</div>


</body>
<script src="/js/app.js"></script>


@yield('my-js')
</html>
