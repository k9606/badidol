<ul class="jieda" id="jieda">
    @foreach ($replies as $index => $reply)
        <li data-id="111" class="jieda-daan" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <a name="reply{{ $reply->id }}"></a>
            <div class="detail-about detail-about-reply">
                <a class="fly-avatar" href="{{ route('users.show', [$reply->user_id]) }}">
                    <img
                        src="{{ $reply->user->avatar }}"
                        alt="{{ $reply->user->name }}">
                </a>
                <div class="fly-detail-user">
                    <a href="{{ route('users.show', [$reply->user_id]) }}" class="fly-link">
                        <cite>{{ $reply->user->name }}</cite>
                        <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                    </a>
                    <!--
                    <span style="color:#5FB878">(管理员)</span>
                    <span style="color:#FF9E3F">（社区之光）</span>
                    <span style="color:#999">（该号已被封）</span>
                    -->
                </div>

                <div class="detail-hits">
                    <span>{{ $reply->created_at }}</span>
                </div>
            </div>
            <div class="detail-body jieda-body photos">
                {!! $reply->content !!}
            </div>
            <div class="jieda-reply">
                <span type="reply">
                <i class="iconfont icon-svgmoban53"></i>
                回复
              </span>
                @can('destroy', $reply)
                    <div class="jieda-admin">
                        <form action="{{ route('replies.destroy', $reply->id) }}"
                              onsubmit="return confirm('确定要删除此评论？');"
                              method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="layui-btn layui-btn-xs jie-admin">
                                删除
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </li>
@endforeach

<!-- 无数据时 -->
    <!-- <li class="fly-none">消灭零回复</li> -->
</ul>
