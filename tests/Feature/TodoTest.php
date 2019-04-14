<?php
declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase//今回のTodoAppに対するテスト内容を記述
{
    /**
     * A basic test example.
     * @test //アノテーション追記
     * @return void
     */
    public function indexTest() //TodoControllerのindexメソッドに対してテスト
    {
        $response = $this->get('/todo');//一覧表示画面のURIに対しgetでリクエストし、レスポンスデータを$responseに格納
        $response->assertStatus(200);//レスポンスのステータス(期待値200番台)をチェック
    }

    /** @test */
    public function createTest()
    {
        $response = $this->get('/todo/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function storeTest()//更新画面からはテスト用データが必要
    {
        $this->post('/todo',
            ['title' => "foo"]
        );
        $this->assertDatabaseHas('todos', ['title' => "foo"]);
    }

    /** @test */
    public function editTest()
    {
        $response = $this->get('todo/1/edit');
        $response->assertStatus(200);
    }

    /** @test */
    public function updateTest()
    {
        $this->put('todo/1',
                   ['title' => 'updateData']
        );
        $this->assertDatabaseHas('todos', ['title' => 'updateData']);
    }
    
    /** @test */
    public function destroyTest()
    { 
        $this->delete('/todo/1');
        $this->assertDatabaseMissing('todos', ['id' => 1]);
    }
}