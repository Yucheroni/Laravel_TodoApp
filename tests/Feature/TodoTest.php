<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * A basic test example.
     * @test //追記
     * @return void
     */
    public function indexTest() //TodoControllerのindexメソッドに対してテスト
    {
        $response = $this->get('/todo');
        $response->assertStatus(200);
    }
    public function createTest()
    {
        $response = $this->get('/todo/create');
        $response->assertStatus(200);
    }
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