<li>
    <p>
        {{ $notification->data['user_name'] }}
        <span>{{ $notification->created_at->diffForHumans() }}</span>
        评论了<a href="{{ $notification->data['topic_link'] }}" target="_blank">{{ $notification->data['topic_title'] }}</a>
    </p>
    <div class="home-dacontent">
        {!! $notification->data['reply_content'] !!}
    </div>
</li>
