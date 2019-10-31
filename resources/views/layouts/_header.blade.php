<div class="fly-header layui-bg-black">
    <div class="layui-container">
        <a class="fly-logo" href="{{ url('/') }}">
            <span class="bi-logo-left">Bad</span><span class="bi-logo-right">Idol</span>
        </a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item layui-this">
                <a href="{{ url('/') }}"><i class="iconfont icon-jiaoliu"></i>交流</a>
            </li>
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
                        <i class="layui-badge fly-badge-vip layui-hide-xs layui-bg-{{ Auth::user()->notification_count > 0 ? 'red' : 'green' }}">{{ Auth::user()->notification_count }}</i>
                        <img src="{{ Auth::user()->avatar }}">
                    </a>
                    <dl class="layui-nav-child">
                        @can('manage_contents')
                            <dd><a href="{{ url(config('administrator.uri')) }}"><i class="layui-icon">&#xe617;</i>管理后台</a>
                            </dd>
                        @endcan
                        <dd><a href="{{ route('notifications.index') }}"><i class="layui-icon ">&#xe63a;</i>我的消息</a>
                        </dd>
                        <dd><a href="{{ route('users.edit', Auth::id()) }}"><i class="layui-icon">&#xe716;</i>编辑资料</a>
                        </dd>
                        <dd><a href="{{ route('users.show', Auth::id()) }}"><i class="layui-icon">&#xe664;</i>个人中心</a>
                        </dd>
                        <hr style="margin: 5px 0;">
                        <dd><a href="#" style="text-align: center;">
                                <form action="{{ route('logout') }}" method="POST"
                                      onsubmit="return confirm('您确定要退出吗？');">
                                    {{ csrf_field() }}
                                    <button class="layui-btn layui-btn-sm layui-btn-danger" type="submit" name="button">退出</button>
                                </form>
                            </a>
                        </dd>
                    </dl>
                </li>
            @endguest
        </ul>
    </div>
</div>

<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            <li class="{{ active_class(if_route('topics.index')) ? 'layui-this' : '' }}"><a href="{{ route('topics.index') }}">话题</a></li>
            <li class="{{ category_nav_active(1) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
            <li class="{{ category_nav_active(2) }}"><a href="{{ route('categories.show', 2) }}">教程</a></li>
            <li class="{{ category_nav_active(3) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
            <li class="{{ category_nav_active(4) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>
            </li>
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search"><i class="layui-icon"></i></span>
            <a href="{{ route('topics.create') }}" class="layui-btn">发表新帖</a>
        </div>
    </div>
</div>
