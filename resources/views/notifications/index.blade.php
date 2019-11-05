@extends('layouts.app')

@section('title', '我的通知')

@section('content')
    <div class="layui-container fly-marginTop">
        <div class="fly-panel" pad20 style="padding-top: 5px;">
            <!--<div class="fly-none">没有权限</div>-->
            <div class="layui-form layui-form-pane">
                <div class="layui-tab layui-tab-brief" lay-filter="user">
                    <ul class="layui-tab-title">
                        <li class="layui-this">我的消息<!-- 编辑帖子 --></li>
                    </ul>
                    <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                        <div class="layui-tab-item layui-show">


                            <div class="fly-panel">
                                <ul class="home-jieda">

                    @if ($notifications->count())

                        <div class="list-unstyled notification-list">
                            @foreach ($notifications as $notification)
                                @include('notifications.types._' . Str::snake(class_basename($notification->type)))
                            @endforeach

                            {!! $notifications->render() !!}
                        </div>

                    @else
                        <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>暂无消息</span></div>
                    @endif

                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
