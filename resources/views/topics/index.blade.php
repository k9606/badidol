@extends('layouts.app')

@section('title', isset($category) ? $category->name : 'BadIdol.com')

@section('content')

    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
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
                        <a href="{{ Request::url() }}?order=default" class="{{ active_class( ! if_query('order', 'recent')) ? 'layui-this' : '' }}">最后回复</a>
                    <span class="fly-mid"></span>
                        <a href="{{ Request::url() }}?order=recent" class="{{ active_class(if_query('order', 'recent')) ? 'layui-this' : '' }}">最新发布</a>
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
