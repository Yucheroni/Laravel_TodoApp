<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;
    public function setup()
    {
      parent::setup();//継承元にあるテスト実行前に行う処理をまとめるメソッドを使う宣言
      $this->prepareForTests();//setupメソッド内でprepareForTestsメソッドを使用する
    }
}
