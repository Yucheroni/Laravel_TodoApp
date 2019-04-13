<?php

use Illuminate\Database\Seeder;//Seederクラスを継承
use Carbon\Carbon;//日付取得が可能なライブラリ

class TodosTableSeeder extends Seeder//seederを継承したクラス
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()//runメソッドでレコードを作成する
    {
      //
      DB::table('todos')->truncate();//DBクラスのtableメソッドを使ってtodosテーブルのビルダを取得。ビルダクラスのtruncateメソッドで全件削除
      DB::table('todos')->insert([//DBクラスのtableメソッドを使ってtodosテーブルのビルダを取得。ビルダクラスのinsertメソッドでkey => valueの配列でレコードを登録
        [
            'title'      => 'MVCを理解する',
            'created_at' => Carbon::create(2019, 1, 1),
            'updated_at' => Carbon::create(2019, 1, 9),
        ],
        [
            'title'      => 'Databaseについて学習する',
            'created_at' => Carbon::create(2019, 1, 17),
            'updated_at' => Carbon::create(2019, 1, 24),
        ],
      ]);
    }
}
