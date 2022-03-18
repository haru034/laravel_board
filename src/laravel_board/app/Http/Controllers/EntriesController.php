<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authクラスを使用
use App\User;
use App\Entry; // Entry.phpにアクセス
class EntriesController extends Controller
{
    /**
     * ホーム画面の表示
     * 
     */
    public function home_screen()
    {
        if (Auth::check()) // = ユーザーが認証されているかチェック
        {
            $entries = Entry::orderBy('created_at', 'desc')->get();
            $user = Auth::user(); // 現在認証しているユーザーを取得
            return view('users.home', ['entries' => $entries, 'user' => $user]); // ログインに成功している場合はホーム画面に遷移
        }
        else
        {
            return redirect('login_form'); // ログインに失敗した場合は、ログイン画面に遷移
        }
    }

    /**
     * 「投稿」ボタンを押した時の処理
     * 
     */
    public function entry(Request $request)
    {
        $entries = new Entry; // $entriesの変数に、Chatモデルを定義
        $user = Auth::user(); // 認証しているユーザーを取得
        $id = Auth::id(); // 認証しているユーザーのIDを取得
        $entries->user_id = $id; // user_idをセット
        // $entries->nickname = $id; // nicknameをセット
        $entries->thread_text = $request->thread_text; // スレッドの本文をセット
        $entries->save(); // $entriesに格納されている情報を保存。
        return redirect('home_screen'); // 入力内容が保存されたら、ホーム画面にリダイレクト
    }
}
