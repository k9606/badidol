<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="baidu-site-verification" content="lzSriR9urd"/>

    <title>@yield('title', '坏偶像社区') | {{ setting('site_name', 'BadIdol.com 坏偶像') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description',
    'BadIdol 坏偶像是一个高品质的粉丝社区，致力于为每位粉丝提供一个讨论偶像、发起提问、获取资讯的创造型社区。'))"/>
    <meta name="keywords" content="@yield('keyword', setting('seo_keyword',
    'badidol,坏偶像,badidol社区,坏偶像社区,badidol论坛,坏偶像论坛,粉丝,粉丝社区,粉丝论坛'))"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://www.layuicdn.com/layui-v2.2.3/css/layui.css">
    <link rel="stylesheet" href="{{ asset('res/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('res/css/badidol.css') }}">

    @yield('styles')

    @include('common._baidu_js_count')

</head>

<body>

@include('common._baidu_js_push')

@include('layouts._header')

<div class="layui-container">

    {{--    @include('shared._messages')--}}

    @yield('content')

</div>

@include('layouts._footer')

@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif

<!-- Scripts -->
<script src="https://www.layuicdn.com/layui-v2.2.3/layui.js"></script>
<script>
    layui.cache.page = '';
    layui.cache.user = {
        username: '游客'
        , uid: -1
        , avatar: "{{ asset('res/images/avatar/00.jpg') }}"
        , experience: 83
        , sex: '男'
    };
    layui.config({
        version: "3.0.0"
        , base: "{{ asset('res/mods') }}/" //这里实际使用时，建议改成绝对路径
    }).extend({
        fly: 'index'
    }).use('fly');
</script>

@yield('scripts')

</body>

</html>
