@if (count($topics))
    <ul class="fly-list">
        @foreach ($topics as $topic)
            <li>
                <a href="{{ route('users.show', [$topic->user_id]) }}" class="fly-avatar">
                    <img src="{{ $topic->user->avatar }}"
                         alt="{{ $topic->user->name }}">
                </a>
                <h2>
                    <a class="layui-badge">{{ $topic->category->name }}</a>
                    <a href="{{ $topic->link() }}">{{ $topic->title }}</a>
                </h2>
                <div class="fly-list-info">
                    <a href="{{ route('users.show', [$topic->user_id]) }}" link>
                        <cite>{{ $topic->user->name }}</cite>
                        <!--
                        <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                        <i class="layui-badge fly-badge-vip">VIP3</i>
                        -->
                    </a>
                    <span>{{ $topic->updated_at->diffForHumans() }}</span>

                    <!--                            <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>-->
                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                    <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="回答"></i> {{ $topic->reply_count }}
              </span>
                </div>
                <div class="fly-list-badge">
                {{--                    <span class="layui-badge layui-bg-black">置顶</span>--}}
                <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                </div>
            </li>
        @endforeach
    </ul>

@else
    <div class="fly-none">没有相关数据</div>
@endif
