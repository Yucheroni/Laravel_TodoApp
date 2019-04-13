<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;//Todoモデルを呼び出す(ModelをContorollerで使用可能にする)
use Auth;//追記

class TodoController extends Controller
{
    private $todo;//privateプロパティを用い、関数内でのみ使用可能にする$todoを置く

    public function __construct(Todo $instanceClass)//Todoクラスをインスタンス化したものを$instancsClassに格納→関数外では使えないので
    {
        $this->todo = $instanceClass;//TodoControllerクラスの中の$todoに、$instanceClassを格納
        $this->middleware('auth');//controllerクラスの中のmiddlewareメソッド実行により、認証されたユーザーなら先の処理に進む許可を行える
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Hello world!"; 削除
        //return view('layouts.app');//削除
        //dd(Auth::id());
        $todos = $this->todo->getAll(Auth::id());//TodoクラスorModelクラス内のgetallメソッドが実行、ログインユーザーに紐づいたデータをDBから全件取得
        //$sql = 'SELECT * FROM todos';
        return view('todo.index', compact('todos'));//viewメソッド(index.blade.phpに'todos'という値をkey=>valueの形にして渡す) 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');//create.blade.phpに遷移のみ
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Formで送られたPOST情報を取得し、変数にインスタンス化
    {
        //dd($request);
        $input = $request->all();//ユーザーのリクエスト情報をallで全件取得し$inputに格納
        //dd(Auth::id());
        $input['user_id'] = Auth::id();//追記　ログインユーザーを取得し、$inputに格納
        $this->todo->fill($input)->save();//fillメソッドでtitleとuse_idカラムのみに絞り、saveメソッドで保存
        //$sql = 'INSERT INTO todos (title) VALUES (:request)'; 
        return redirect()->to('todo');//todo.indexにredirectする(indexメソッドが実行され、index.blade.php => 一覧表示処理)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//view側で渡してきたリクエストパラメータの取得
    {
        $todo = $this->todo->find($id);//$idを元にDBに対し検索をかける
        //$sql = 'SELECT title FROM todos WHERE id = :id';
        return view('todo.edit', compact('todo'));//編集viewに対し、検索結果のtodoをkey=>valueの値にして渡す
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//更新情報のリクエストとパラメータ
    {
        $input = $request->all();//ユーザーのリクエストを全件取得
        $this->todo->find($id)->fill($input)->save();//DBに対し$idをもとに検索をかけ、fillでtitleとuser_idに絞り、saveで保存
        //$sql = 'UPDATE todos SET title = :request WHERE id = :id'; 
        return redirect()->to('todo');//todo.indexにredirectする(indexメソッドが実行され、index.blade.php => 一覧表示処理)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();//DBに対し$idをもとに検索をかけ、deleteメソッドで物理削除
        return redirect()->to('todo');//todo.indexにredirectする(indexメソッドが実行され、index.blade.php => 一覧表示処理)
        //$sql = 'DELETE FROM todos WHERE id = :id';
    }
}
