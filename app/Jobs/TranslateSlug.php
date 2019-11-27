<?php

namespace App\Jobs;

use App\Console\Commands\HotspotRobots;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;

    public function __construct(Topic $topic)
    {
        // 队列任务构造器中接收了 Eloquent 模型，将会只序列化模型的 ID
        $this->topic = $topic;
    }

    public function handle()
    {
        ini_set('memory_limit', '1024M');

        Jieba::init();
        Finalseg::init();

        $title = $this->topic->title;
        $hotspotRobots = new HotspotRobots();

        foreach ($hotspotRobots->decoration as $v) {
            $title = str_replace($v, '', $title);
        }

        $seg = array_unique(array_filter(Jieba::cut($title), function ($item) {
            return mb_strlen($item) > 1;
        }));
        array_unshift($seg, $title);

        $keywords = rtrim(mb_substr(implode(',', $seg) . ',' . setting('seo_keyword', 'badidol,坏偶像,badidol社区,坏偶像社区,badidol论坛,坏偶像论坛,粉丝,粉丝社区,粉丝论坛'), 0, 250), ',');

        // 请求百度 API 接口进行翻译
        $slug = app(SlugTranslateHandler::class)->translate($title);

        // 为了避免模型监控器死循环调用，我们使用 DB 类直接对数据库进行操作
        \DB::table('topics')
            ->where('id', $this->topic->id)
            ->update([
                'slug' => $slug,
                'keywords' => $keywords,
            ]);
    }
}
