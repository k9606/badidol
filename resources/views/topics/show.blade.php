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

                    <span class="layui-badge" style="background-color: #999;">未结</span>
                    <!-- <span class="layui-badge" style="background-color: #5FB878;">已结</span> -->

                    <span class="layui-badge layui-bg-black">置顶</span>
                    <span class="layui-badge layui-bg-red">精帖</span>

                    @can('update', $topic)
                        <div class="fly-admin-box" data-id="123">
                            <span class="layui-btn layui-btn-xs jie-admin" type="del"><a
                                    href="{{ route('topics.edit', $topic->id) }}">删除</a></span>
                            <span class="layui-btn layui-btn-xs jie-admin" type="del"><a
                                    href="{{ route('topics.destroy', $topic->id) }}">删除</a></span>

                            <span class="layui-btn layui-btn-xs jie-admin" type="set" field="stick" rank="1">置顶</span>
                            <!-- <span class="layui-btn layui-btn-xs jie-admin" type="set" field="stick" rank="0" style="background-color:#ccc;">取消置顶</span> -->

                            <span class="layui-btn layui-btn-xs jie-admin" type="set" field="status" rank="1">加精</span>
                            <!-- <span class="layui-btn layui-btn-xs jie-admin" type="set" field="status" rank="0" style="background-color:#ccc;">取消加精</span> -->
                        </div>
                    @endcan
                    <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{ $topic->reply_count }}</a>
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
                        </a>
                        <span>{{ $topic->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                        <span style="padding-right: 10px; color: #FF7200">暂无签名</span>
                        @can('update', $topic)
                            <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a
                                    href="{{ route('topics.edit', $topic->id) }}">编辑此贴</a></span>
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
