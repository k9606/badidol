<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="baidu-site-verification" content="b1HexK41cs"/>

    <title>@yield('title', 'BadIdol.com') | {{ setting('site_name', 'BadIdol 坏偶像') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'BadIdol 坏偶像'))"/>
    <meta name="keywords"
          content="@yield('keyword', setting('seo_keyword', 'badidol,坏偶像,bad偶像,坏idol,badaidou,坏aidou,bad爱豆,坏爱豆,bad idol,bad-idol,badidou,坏idou,badidol.com'))"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://www.layuicdn.com/layui-v2.2.3/css/layui.css">
    <link rel="stylesheet" href="{{ asset('res/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('res/css/badidol.css') }}">

    @yield('styles')

</head>

<body>

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
