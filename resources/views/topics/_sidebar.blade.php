@if (count($active_users))
    <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
        <h3 class="fly-panel-title">活跃用户</h3>
        <dl>
            <!--<i class="layui-icon fly-loading">&#xe63d;</i>-->
            @foreach ($active_users as $active_user)
                <dd>
                    <a href="user/home.html">
                        <img
                            src="{{ $active_user->avatar }}"><cite>{{ $active_user->name }}</cite><i>106次回答</i>
                    </a>
                </dd>
            @endforeach
        </dl>
    </div>
@endif

@if (count($links))
    <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">资源推荐</dt>
        @foreach ($links as $link)
            <dd>
                <a href="{{ $link->link }}">{{ $link->title }}</a>
                <span><i class="iconfont icon-pinglun1"></i> 16</span>
            </dd>
    @endforeach

    <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
    </dl>
@endif

@if (count($links))
    <div class="fly-panel">
        <h3 class="fly-panel-title">资源推荐</h3>
        <ul class="fly-panel-main fly-list-static">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="fly-panel">
    <div class="fly-panel-title">
        这里可作为广告区域
    </div>
    <div class="fly-panel-main">
        <a href="#" target="_blank" class="fly-zanzhu" style="background-color: #5FB878;">BadIdol 坏偶像</a>
    </div>
</div>

<div class="fly-panel fly-link">
    <h3 class="fly-panel-title">友情链接</h3>
    <dl class="fly-panel-main">
        <dd><a href="https://learnku.com/laravel" target="_blank">Laravel China</a>
        <dd>
        <dd><a href="https://www.layui.com" target="_blank">Layui</a>
        <dd>
    </dl>
</div>
