<?php
declare(strict_types=1);
//TodoModelを作成(DBから登録データを取得し、viewへ表示させるため)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [ //テーブルにレコードを登録できるカラムに制限をかける
      'title'
      //'user_id' 
    ];

    // public function getAll($id)//追記
    // {
    //   // select * from todos where user_id = 1;
    //    return $this->where('user_id', $id)->get();//user_idが$idのものをgetで取得し、returnする
    // }
}
