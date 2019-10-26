<?php

namespace App\Observers;

use App\Jobs\DefaultAvatar;
use App\Models\User;

class UserObserver
{
    public function saving(User $user)
    {
        // 如果用户没有头像, 生成默认头像
        if (!$user->avatar) {

            // 推送任务到队列
            dispatch(new DefaultAvatar($user));
        }
    }
}
