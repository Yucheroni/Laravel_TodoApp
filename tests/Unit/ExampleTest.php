<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase// 必須コード
{
    /**
     * A basic test example.
     * //アノテーションの際は@testを追記
     * @return void
     */
    public function testBasicTest()// testメソッドは２種類　testBasicTest or basicTest
    {
        $this->assertTrue(true);
    }
}
