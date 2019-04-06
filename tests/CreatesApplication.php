<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Artisan; //追記 artisanコマンドを使用可能にする
use App\Todo; //追記　Todo.phpを使用可能にする

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
    //追記
    public function prepareForTests()
    {
        Artisan::call('migrate');
        if(!Todo::all()->count()){
            Artisan::call('db:seed');
        }
    }
}
