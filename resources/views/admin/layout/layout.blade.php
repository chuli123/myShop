<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>欢迎页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/xadmin.css') }}">
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/xadmin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/cookie.js') }}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/admin/js/html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/respond.min.js') }}"></script>
    <![endif]-->
    @yield('style')
</head>

<body>
@yield('content')
@yield('script')
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>