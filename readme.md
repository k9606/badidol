### BadIdol 论坛
- github: https://github.com/badidol/badidol
- website: http://badidol.com

![BadIdol 论坛](http://badidol.com/uploads/images/topics/201912/19/1_1576744094_AfXJ8eyIpo.png)

> 项目基于 Laravel 6

#### 运行环境
- ubuntu 18.04 +
- nginx 1.14 +
- php 7.2 +
- mysql 8.0 +
- redis 4.0 +

#### 安装方式
```shell script
// 克隆代码
git clone https://github.com/badidol/badidol.git

// 进入项目
cd badidol

// 安装依赖
composer install

// 生成配置文件并修改相应配置, 如mysql, redis等
cp .env.example .env

// 生成密钥
php artisan key:generate

// 数据库迁移
php artisan migrate --seed

// 添加 crontab
* * * * * php /badidol/artisan schedule:run >> /dev/null 2>&1
```

#### 其他
- 首页: http://localhost/
- 后台: http://localhost/admin

若你喜欢这个项目, 麻烦给个 star :-)

如果有任何问题, 大家可以提 issues, 或加入 qq 群:

![QQ 群](http://badidol.com/res/images/qq.jpg)
