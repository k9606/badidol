@extends('layouts.app')

@section('content')

    <div class="layui-container fly-marginTop">
        <div class="fly-panel" pad20 style="padding-top: 5px;">
            <!--<div class="fly-none">没有权限</div>-->
            <div class="layui-form layui-form-pane">
                <div class="layui-tab layui-tab-brief" lay-filter="user">
                    <ul class="layui-tab-title">
                        <li class="layui-this">
                            @if($topic->id)
                                编辑话题
                            @else
                                新建话题
                            @endif
                        </li>
                    </ul>
                    <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                        <div class="layui-tab-item layui-show">
                            @if($topic->id)
                                <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                                    <input type="hidden" name="_method" value="PUT">
                                    @else
                                        <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                            @endif

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            @include('shared._error')
                                            <div class="layui-row layui-col-space15 layui-form-item">
                                                <div class="layui-col-md3">
                                                    <label class="layui-form-label">所在分类</label>
                                                    <div class="layui-input-block">
                                                        <select lay-verify="required" name="category_id" lay-filter="column">
                                                            <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类
                                                            </option>
                                                            @foreach ($categories as $value)
                                                                <option
                                                                    value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>
                                                                    {{ $value->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="layui-col-md9">
                                                    <label for="L_title" class="layui-form-label">标题</label>
                                                    <div class="layui-input-block">
                                                        <input type="text" id="L_title" name="title" required lay-verify="required"
                                                               autocomplete="off" class="layui-input" value="{{ old('title', $topic->title ) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="layui-form-item layui-form-text">
                                                <div class="layui-input-block">
                                    <textarea id="L_content" name="body" required lay-verify="required"
                                              placeholder="详细描述" class="layui-textarea fly-editor"
                                              style="height: 260px;">{{ old('body', $topic->body ) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="layui-form-item">
                                                <button class="layui-btn" lay-filter="*" lay-submit>立即发布</button>
                                            </div>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/module.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload_image') }}',
                    params: {
                        _token: '{{ csrf_token() }}'
                    },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        });
    </script>
@stop
