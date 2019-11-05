<div class="layui-col-md6 fly-home-jie">
    <div class="fly-panel">
        <h3 class="fly-panel-title">最新话题</h3>
        @if (count($topics))
            <ul class="jie-row">
                @foreach ($topics as $topic)
                    <li>
                        <a href="{{ $topic->link() }}" class="jie-title"> {{ $topic->title }}</a>
                        <i>{{ $topic->created_at->diffForHumans() }}</i>
                        <em class="layui-hide-xs">{{ $topic->reply_count }} 回复</em>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何话题</i>
            </div>
        @endif
    </div>
</div>
