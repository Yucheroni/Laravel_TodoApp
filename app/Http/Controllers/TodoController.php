<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;//appディレクトリの中のTodo.phpを呼び出す(ModelをContorollerで使用可能にする)
use Auth;//追記

class TodoController extends Controller
{
    private $todo;//$todoを置く

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
        $todos = $this->todo->getAll(Auth::id());//TodoクラスorModelクラス内のallメソッドが実行
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
    public function store(Request $request)
    {
        //dd($request);
        $input = $request->all();
        //dd(Auth::id());
        $input['user_id'] = Auth::id();//追記
        $this->todo->fill($input)->save();
        //$sql = 'INSERT INTO todos (title) VALUES (:request)'; 
        return redirect()->to('todo');
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
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        //$sql = 'SELECT title FROM todos WHERE id = :id';
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->todo->find($id)->fill($input)->save();
        //$sql = 'UPDATE todos SET title = :request WHERE id = :id'; 
        return redirect()->to('todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->to('todo');
        //$sql = 'DELETE FROM todos WHERE id = :id';
    }
}
