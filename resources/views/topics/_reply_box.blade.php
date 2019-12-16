@include('shared._error')

<div class="layui-form layui-form-pane">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <div class="layui-form-item layui-form-text">
            <a name="comment"></a>
            <div class="layui-input-block reply-simditor">
                <textarea name="content" id="editor" placeholder="请输入内容" required></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            <button type="submit" class="layui-btn">提交回复</button>
        </div>
    </form>
</div>

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.staticfile.org/simditor/2.3.6/styles/simditor.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('res/css/simditor-emoji.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('res/css/simditor-mention.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="https://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('res/mods/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/mods/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/mods/uploader.js') }}"></script>
    <script type="text/javascript" src="https://cdn.staticfile.org/simditor/2.3.6/lib/simditor.min.js"></script>
    <script type="text/javascript" src="{{ asset('res/mods/simditor-emoji.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/mods/simditor-mention.js') }}"></script>

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
                mention: {
                    // TODO: @ 功能待做
                    items: [
                        {
                            id: 0,
                            name: '',
                            url: '',
                        },
                    ],
                }
            });
        });
    </script>
@stop
