<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;//seederクラスを継承

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //runメソッドの実行によりシーディング処理
    {
      // $this->call(UsersTableSeeder::class);
      $this->call(TodosTableSeeder::class); //seederクラスのcallメソッドで、引数に作成したシーディングファイルとclassプロパティを呼び出す
    }
}
