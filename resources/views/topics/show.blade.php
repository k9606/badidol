@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8 content detail">
            <div class="fly-panel detail-box">
                <h1>{{ $topic->title }}</h1>
                <div class="fly-detail-info">
                    <!-- <span class="layui-badge">审核中</span> -->
                    <span class="layui-badge layui-bg-green fly-detail-column">动态</span>

{{--                    <span class="layui-badge" style="background-color: #999;">未结</span>--}}
{{--                    <!-- <span class="layui-badge" style="background-color: #5FB878;">已结</span> -->--}}

{{--                    <span class="layui-badge layui-bg-black">置顶</span>--}}
{{--                    <span class="layui-badge layui-bg-red">精帖</span>--}}

                    <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{ $topic->reply_count }}</a>
{{--            <i class="iconfont" title="人气">&#xe60b;</i> 99999--}}
          </span>
                </div>
                <div class="detail-about">
                    <a class="fly-avatar" href="{{ route('users.show', $topic->user->id) }}">
                        <img src="{{ $topic->user->avatar }}"
                             alt="{{ $topic->user->name }}">
                    </a>
                    <div class="fly-detail-user">
                        <a href="{{ route('users.show', $topic->user->id) }}" class="fly-link">
                            <cite>{{ $topic->user->name }}</cite>
                            <i class="iconfont icon-renzheng" title="认证信息：xxx"></i>
                        </a>
                        <span>{{ $topic->created_at }}</span>
                    </div>
                    <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                        <span style="padding-right: 10px; color: #FF7200">暂无签名</span>
                        @can('update', $topic)
                            <span>
                                <button class="layui-btn layui-btn-xs jie-admin">
                                    <a href="{{ route('topics.edit', $topic->id) }}">编辑</a>
                                </button>
                            </span>
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="post"
                                  style="display: inline-block;"
                                  onsubmit="return confirm('您确定要删除吗？');">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="layui-btn layui-btn-xs jie-admin layui-btn-danger">
                                    删除
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="detail-body photos">
                    {!! $topic->body !!}
                </div>
            </div>

            {{-- 用户回复列表 --}}
            <div class="fly-panel detail-box" id="flyReply">
                <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
                    <legend>回帖</legend>
                </fieldset>
                @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
                @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
            </div>

        </div>
        <div class="layui-col-md4">
            @include('topics._sidebar')
        </div>
    </div>
@stop
