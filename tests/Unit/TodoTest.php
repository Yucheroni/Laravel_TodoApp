<?php
declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Todo;//追記

//unitテスト
class TodoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function todoModelInstanceTest()
    {
        $this->assertInstanceOf(Todo::class, new Todo());
    }
}
