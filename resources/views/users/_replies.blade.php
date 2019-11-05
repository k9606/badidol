<div class="layui-col-md6 fly-home-da">
    <div class="fly-panel">
        <h3 class="fly-panel-title">回复</h3>
        @if (count($replies))
            <ul class="home-jieda">
                @foreach ($replies as $reply)
                    <li>
                        <p>
                            <span>{{ $reply->created_at->diffForHumans() }}</span>
                            在<a href="{{ $reply->topic->link(['#reply' . $reply->id]) }}"
                                target="_blank">{{ $reply->topic->title }}</a>中回复：
                        </p>
                        <div class="home-dacontent">
                            {!! $reply->content !!}
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回复任何话题</span></div>
        @endif
    </div>
</div>
