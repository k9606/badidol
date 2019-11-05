@extends('layouts.app')

@section('title', isset($category) ? $category->name : 'BadIdol.com')

@section('content')

    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">

            {{--置顶--}}
            <div class="fly-panel">
                <div class="fly-panel-title fly-filter">
                    <a>置顶</a>
                </div>
                <ul class="fly-list">
                    <li>
                        <a href="#" class="fly-avatar">
                            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"
                                 alt="贤心">
                        </a>
                        <h2>
                            <a class="layui-badge">动态</a>
                            <a href="#">BadIdol 坏偶像公告</a>
                        </h2>
                        <div class="fly-list-info">
                            <a href="#" link>
                                <cite>BadIdol</cite>
                                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                                <i class="layui-badge fly-badge-vip">站长</i>
                            </a>
                            <span>刚刚</span>

                            <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
                        </div>
                        <div class="fly-list-badge">

                            <span class="layui-badge layui-bg-black">置顶</span>

                        </div>
                    </li>
                </ul>
            </div>
            {{--置顶--}}

            <div class="fly-panel" style="margin-bottom: 0;">

                <div class="fly-panel-title fly-filter">
                    <a href="" class="layui-this">综合</a>
                    <span class="fly-mid"></span>
                    <a href="">未结</a>
                    <span class="fly-mid"></span>
                    <a href="">已结</a>
                    <span class="fly-mid"></span>
                    <a href="">精华</a>
                    <span class="fly-filter-right layui-hide-xs">
                        <a href="{{ Request::url() }}?order=default"
                           class="{{ active_class( ! if_query('order', 'recent')) ? 'layui-this' : '' }}">最后回复</a>
                    <span class="fly-mid"></span>
                        <a href="{{ Request::url() }}?order=recent"
                           class="{{ active_class(if_query('order', 'recent')) ? 'layui-this' : '' }}">最新发布</a>
                    </span>
                </div>

                <div class="card-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}
                    {{--                    <div class="mt-5">--}}
                    {{--                        {!! $topics->appends(Request::except('page'))->render() !!}--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="layui-col-md4">
            @include('topics._sidebar')
        </div>
    </div>

@endsection
