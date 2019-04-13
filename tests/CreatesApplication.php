<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Artisan; //追記 artisanコマンドを使用可能にする
use App\Todo; //追記　Todo.phpモデルを使用可能にし、table操作を行えるようにする

trait CreatesApplication//traitは複数のメソッドをまとめたもの　useすることでそのclass内に加えることができる
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function prepareForTests() //追記
    {
        Artisan::call('migrate');//テスト用にmigrateとseedを行えるように、Artisanコマンドを使用可能にする
        if(!Todo::all()->count()){//todosテーブルにデータがなければseedを走らせる
            Artisan::call('db:seed');
        }
    }
}
