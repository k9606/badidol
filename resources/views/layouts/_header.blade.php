<div class="fly-header layui-bg-black">
    <div class="layui-container">
        <a class="fly-logo" href="{{ url('/') }}">
            <img src="../res/images/logo.png" alt="layui">
        </a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item layui-this">
                <a href="{{ url('/') }}"><i class="iconfont icon-jiaoliu"></i>交流</a>
            </li>
            {{--            <li class="layui-nav-item">--}}
            {{--                <a href="case/case.html"><i class="iconfont icon-iconmingxinganli"></i>案例</a>--}}
            {{--            </li>--}}
            {{--            <li class="layui-nav-item">--}}
            {{--                <a href="http://www.layui.com/" target="_blank"><i class="iconfont icon-ui"></i>框架</a>--}}
            {{--            </li>--}}
        </ul>

        <ul class="layui-nav fly-nav-user">

            <!-- 未登入的状态 -->
            @guest
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="{{ route('login') }}"></a>
                </li>
                <li class="layui-nav-item">
                    <a href="{{ route('login') }}">登录</a>
                </li>
                <li class="layui-nav-item">
                    <a href="{{ route('register') }}">注册</a>
                </li>

                <!-- 登入后的状态 -->
            @else
                <li class="layui-nav-item">
                    <a class="fly-nav-avatar" href="javascript:;">
                        <cite class="layui-hide-xs">{{ Auth::user()->name }}</cite>
                        <i class="layui-badge fly-badge-vip layui-hide-xs">{{ Auth::user()->notification_count }}</i>
                        <img src="{{ Auth::user()->avatar }}">
                    </a>
                    <dl class="layui-nav-child">
                        @can('manage_contents')
                            <dd><a href="{{ url(config('administrator.uri')) }}"><i class="layui-icon">&#xe620;</i>管理后台</a>
                            </dd>
                        @endcan
                        <dd><a href="{{ route('users.edit', Auth::id()) }}"><i class="layui-icon">&#xe620;</i>基本设置</a>
                        </dd>
                        <dd><a href="{{ route('notifications.index') }}"><i class="iconfont icon-tongzhi"
                                                                            style="top: 4px;"></i>我的消息</a></dd>
                        <dd><a href="{{ route('users.show', Auth::id()) }}"><i class="layui-icon"
                                                                               style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a>
                        </dd>
                        <hr style="margin: 5px 0;">
                        <dd><a href="{{ route('logout') }}" style="text-align: center;">退出</a></dd>
                    </dl>
                </li>
            @endguest
        </ul>
    </div>
</div>

<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            <li class="layui-hide-xs layui-this"><a href="{{ route('topics.index') }}">话题<span
                        class="layui-badge-dot"></span></a></li>
            <li><a href="{{ route('categories.show', 1) }}">分享</a></li>
            <li><a href="{{ route('categories.show', 2) }}">教程</a></li>
            <li><a href="{{ route('categories.show', 3) }}">问答</a></li>
            <li><a href="{{ route('categories.show', 4) }}">公告</a></li>
            </li>
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search"><i class="layui-icon"></i></span>
            <a href="{{ route('topics.create') }}" class="layui-btn">发表新帖</a>
        </div>
        <div class="layui-hide-sm layui-show-xs-block"
             style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
            <a href="{{ route('topics.create') }}" class="layui-btn">发表新帖</a>
        </div>
    </div>
</div>
