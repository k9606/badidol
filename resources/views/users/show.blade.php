@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="fly-home fly-panel" style="background-image: url();">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
        <i class="iconfont icon-renzheng" title="社区认证"></i>
        <h1>
            {{ $user->name }}
            <i class="iconfont icon-nan"></i>
            <!-- <i class="iconfont icon-nv"></i>  -->
        </h1>

        <p style="padding: 10px 0; color: #5FB878;">{{ $user->email }}</p>

        <p class="fly-home-info">
            <i class="iconfont icon-shijian"></i><span>注册于 {{ $user->created_at }}</span>
            <i class="iconfont icon-chengshi"></i><span>最后活跃 {{ $user->last_actived_at }}</span>
        </p>

        <p class="fly-home-sign">{{ $user->introduction }}</p>

    </div>

    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])

            @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
        </div>
    </div>

@stop
