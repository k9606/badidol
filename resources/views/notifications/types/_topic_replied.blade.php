<li>
    <p>
        <a href="{{ route('users.show', $notification->data['user_id']) }}"
           target="_blank">{{ $notification->data['user_name'] }}</a><i class="iconfont icon-renzheng"
                                                                        title="认证信息：XX"></i>
        <span>{{ $notification->created_at }}评论了</span>
        <a href="{{ $notification->data['topic_link'] }}" target="_blank">{{ $notification->data['topic_title'] }}</a>
    </p>
    <div class="home-dacontent">
        {!! $notification->data['reply_content'] !!}
    </div>
</li>
