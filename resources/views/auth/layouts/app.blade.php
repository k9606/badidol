<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BadIdol.com') | {{ setting('site_name', 'BadIdol 坏偶像') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'BadIdol 坏偶像'))"/>
    <meta name="keywords"
          content="@yield('keyword', setting('seo_keyword', 'badidol,坏偶像,bad偶像,坏idol,badaidou,坏aidou,bad爱豆,坏爱豆,bad idol,bad-idol,badidou,坏idou,badidol.com'))"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('res/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('res/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('res/css/badidol.css') }}">

</head>

<body>

@include('layouts._header')

<div class="layui-container">

    @yield('content')

</div>

@include('layouts._footer')

</body>

</html>
