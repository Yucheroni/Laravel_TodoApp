<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //runメソッド
    {
      // $this->call(UsersTableSeeder::class);
      $this->call(TodosTableSeeder::class); //同階層ファイルで追加したクラスを呼び出す
    }
}
