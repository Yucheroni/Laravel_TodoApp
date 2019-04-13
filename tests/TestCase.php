<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;//TransactionsはDBに対する一連の更新や挿入処理

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;
    public function setup()
    {
      parent::setup();//継承元のBaseTestCaseにあるメソッドで、テストで行う処理をまとめる内容になっている
      $this->prepareForTests();//traitからuseしてきたメソッド。setupメソッド内でprepareForTestsメソッドを使用する
    }
}
