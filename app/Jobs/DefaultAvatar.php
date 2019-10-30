<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
use Overtrue\Pinyin\Pinyin;
use Str;

class DefaultAvatar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        // 队列任务构造器中接收了 Eloquent 模型，将会只序列化模型的 ID
        $this->user = $user;
    }

    public function handle(Pinyin $pinyin)
    {
        $userName = $pinyin->abbr($this->user->name, '', PINYIN_KEEP_ENGLISH);
        if (!$userName) {
            $userName = $pinyin->abbr($this->user->name, '', PINYIN_KEEP_NUMBER);

            if (!$userName) {
                $userName = $pinyin->abbr($this->user->name, '', PINYIN_KEEP_PUNCTUATION);
            }
        }
        $userName = strtoupper($userName);

        $path = '/uploads/images/avatars/' . $this->user->id . '_' . time() . '_' . Str::random(10) . '.' . 'png';

        $userAvatarPath = public_path() . $path;
        $userAvatarUrl = config('app.url') . $path;

        \Avatar::create($userName)->save($userAvatarPath);

        // 为了避免模型监控器死循环调用，我们使用 DB 类直接对数据库进行操作
        \DB::table('users')->where('id', $this->user->id)->update(['avatar' => $userAvatarUrl]);
    }
}
