<?php
declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoApiTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function indexTest()
    {
      $response = $this->get('/api/todos');
      $response->assertStatus(200);
    }

    public function storeest()
    {
      $this->post('/api/todos',
        ['title' => "test"]
      );
      $this->assertDatabaseHas('todos', ['title' => "test"]);
    }

    public function showTest()
    {
      $response = $this->get('/api/todos/1');
      $response->assertStatus(200);
    }

    public function updateTest()
    {
      $this->put('todo/1',
        ['title' => 'updateData']
      );
      $this->assertDatabaseHas('todo', ['title' => 'updateData']);
    }

    public function destroyTest()
    {
      $this->delete('/todo/1');
      $this->assertDatabaseMissing('todos', ['id' => 1]);
    }
}
