<?php

use Illuminate\Support\Facades\Schema;//Schemaクラスを継承
use Illuminate\Database\Schema\Blueprint;//Blueprintクラスを継承
use Illuminate\Database\Migrations\Migration;//Migrationを継承

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//テーブル生成処理
    {
        Schema::create('todos', function (Blueprint $table) { //Schemaクラスのcreateメソッドおよび第1引数にテーブル名でtodosテーブル作成。第2引数にはテーブル内フィールド設定のためBlueprintクラスのメソッドを用いる
            $table->increments('id');
            $table->string('title');
            $table->timestamps();//created_atとupdated_atを自動生成するtimestampsメソッド
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//テーブル削除処理
    {
        Schema::dropIfExists('todos');//Schemaクラスのdropifexistsメソッドは、引数のテーブル名があった場合は削除する
    }
}
