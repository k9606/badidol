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
                                <form action="{{ route('topics.update', $topic->id) }}" method="POST"
                                      accept-charset="UTF-8">
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
                                                        <select lay-verify="required" name="category_id"
                                                                lay-filter="column">
                                                            <option value="" hidden
                                                                    disabled {{ $topic->id ? '' : 'selected' }}>请选择分类
                                                            </option>
                                                            @foreach ($categories as $value)
                                                                <option
                                                                    value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="layui-col-md9">
                                                    <label for="L_title" class="layui-form-label">标题</label>
                                                    <div class="layui-input-block">
                                                        <input type="text" id="L_title" name="title" required
                                                               lay-verify="required"
                                                               autocomplete="off" class="layui-input"
                                                               value="{{ old('title', $topic->title ) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="layui-form-item layui-form-text">
                                                <div class="layui-input-block">
                                    <textarea name="body" class="form-control" id="editor" rows="6"
                                              placeholder="请填入至少三个字符的内容。"
                                              required autofocus>{{ old('body', $topic->body ) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="layui-form-item">
                                                <button class="layui-btn" type="submit">立即发布</button>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.staticfile.org/simditor/2.3.6/styles/simditor.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('res/css/simditor-emoji.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="https://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('res/mods/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/mods/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/mods/uploader.js') }}"></script>
    <script type="text/javascript" src="https://cdn.staticfile.org/simditor/2.3.6/lib/simditor.min.js"></script>
    <script type="text/javascript" src="{{ asset('res/mods/simditor-emoji.js') }}"></script>

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
                toolbar: [
                    'emoji',
                    'title',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'fontScale',
                    'color',
                    'ol',
                    'ul',
                    'blockquote',
                    'code',
                    'table',
                    'link',
                    'image',
                    'hr',
                    'indent',
                    'outdent',
                    'alignment',
                ],
                emoji: {
                    imagePath: "{{ asset('res/emoji/') }}",
                },
            });
        });
    </script>
@stop
