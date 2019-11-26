<?php

namespace App\Console\Commands;

use App\Models\Topic;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HotspotRobots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'badidol:hotspot_robots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '热点机器人';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Client $client)
    {
        if (!$hotspotRobots = Cache::get('hotspot_robots')) {
            $hotspotRobots = DB::table('users')
                ->where('email', 'like', '%@badidol.com')
                ->pluck('id')
                ->toArray();
            if (!$hotspotRobots) return;

            Cache::put('hotspot_robots', $hotspotRobots, 10);
        }
        $randEnd = count($hotspotRobots) - 1;

        $siteName = setting('site_name', 'BadIdol.com 坏偶像') . ' | ';

        $crawler = $client->request('GET', 'http://top.baidu.com/buzz?b=1&fr=20811');
        $content = $crawler->filter('.list-table > .item-tr');
        foreach ($content as $k => $v) {
            $tmp = explode("\r\n", trim($v->textContent));
            $title = trim($tmp[0]);
            $body = trim($tmp[1]);
            $href = $siteName . $title;

            $topic = new Topic();
            $topic->user_id = $hotspotRobots[rand(0, $randEnd)];
            $topic->category_id = 3;
            $topic->title = $title;
            $topic->body = $body . "<a href='https://www.baidu.com/s?ie=UTF-8&wd=$href'>查看全部</a>";
            $topic->save();
        }
    }
}
