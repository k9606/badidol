<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BadIdol') - {{ setting('site_name', 'BadIdol 坏偶像') }}</title>
    <meta name="description" content="@yield('description', setting('seo_description', 'BadIdol 坏偶像'))"/>
    <meta name="keyword"
          content="@yield('keyword', setting('seo_keyword', 'badidol,坏偶像,bad偶像,坏idol,badaidou,坏aidou,bad爱豆,坏爱豆,bad idol,bad-idol,badidou,坏idou'))"/>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.staticfile.org/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">

    @yield('styles')

</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('layouts._header')

    <div class="container">

        @include('shared._messages')

        @yield('content')

    </div>

    @include('layouts._footer')
</div>

@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>

<script src="https://cdn.staticfile.org/semantic-ui/2.4.1/semantic.js"></script>

@yield('scripts')

</body>

</html>
