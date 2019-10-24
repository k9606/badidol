<div class="ui one column grid">
    <div class="column">
        <div class="ui fluid image">
            <div class="ui orange ribbon label">
                <i class="hotel icon"></i> BadIdol 公告
            </div>
            <table class="ui red table my-ui-red-table">
                <thead>
                <tr>
                    <th>i</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Laravel 是优雅的 PHP Web 开发框架。具有高效、简洁、富于表达力等优点。采用 MVC 设计，是崇尚开发效率的全栈框架。是最受关注的 PHP 框架。
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('topics.create') }}" class="btn btn-success btn-block my-btn-success"
                           aria-label="Left Align">
                            <i class="fas fa-pencil-alt mr-2"></i> 新话题
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@if (count($active_users))
    <table class="ui red table my-ui-red-table">
        <thead>
        <tr>
            <th><i class="wheelchair icon"></i> 活跃用户</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                @foreach ($active_users as $active_user)
                    <a class="media mt-2" href="{{ route('users.show', $active_user->id) }}">
                        <div class="media-left media-middle mr-2 ml-1">
                            <img src="{{ $active_user->avatar }}" width="24px" height="24px" class="media-object">
                        </div>
                        <div class="media-body">
                            <small class="media-heading text-secondary">{{ $active_user->name }}</small>
                        </div>
                    </a>
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
@endif

<div class="ui one column grid">
    <div class="column">
        <div class="ui fluid image">
            <div class="ui blue ribbon label">
                <i class="spoon icon"></i> 资源推荐
            </div>
            @if (count($links))
                <table class="ui teal table my-ui-red-table">
                    <thead>
                    <tr>
                        <th>i</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            @foreach ($links as $link)
                                <a class="media mt-1" href="{{ $link->link }}">
                                    <div class="media-body">
                                        <span class="media-heading text-muted">{{ $link->title }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<div class="ui one column grid">
    <div class="column">
        <div class="ui fluid image">
            <div class="ui teal ribbon label">
                <i class="spoon icon"></i> 资源推荐
            </div>
            @if (count($links))
                <table class="ui red table my-ui-red-table">
                    <thead>
                    <tr>
                        <th>i</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            @foreach ($links as $link)
                                <a class="media mt-1" href="{{ $link->link }}">
                                    <div class="media-body">
                                        <span class="media-heading text-muted">{{ $link->title }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
