<?php
declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase //extends TestCaseは必須コード
{
    /**
     * A basic test example.
     * @test //アノテーションの際は追記
     * @return void
     */
    public function basicTest()// testのメソッドは２種類 testBasicTest or basicTest
    {
        $response = $this->get('/');// getリクエストで引数のURIにアクセスし、返り値を格納
        $response->assertStatus(200);// リクエスト結果のステータスを確認　()内の値は期待値
    }
}// 結果として、getリクエストが問題ないかのテスト
