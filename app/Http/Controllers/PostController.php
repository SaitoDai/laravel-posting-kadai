<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//やりとりするモデルを宣言する
use App\Models\Post;

class PostController extends Controller
{
    //一覧ページ
    public function unkox() {
        $posts = Post::all();  //ここでテーブルからデータを引っ張ってきて代入。
        return view('index', compact('posts'));
    }

    //作成ページ
    public function uncreate() {
        return view('create');
    }

    //作成機能
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:40',
            'content' => 'required|max:40',
        ]);
        
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save(); //Postテーブルに保存

        return redirect()->route('undex')->with('flash_message', '投稿が完了しました。');
    }

    public function unshow(Post $post) {
        return view('show', compact('post'));
    }

    //更新ページ
    public function unedit(Post $post){
        return view('edit', compact('post'));
    }
        

    //更新機能
    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|max:40',
            'content' => 'required|max:200',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('unkoshow', $post->id)->with('flash_message', '投稿を編集しました。');
    }



    //削除機能
    public function unkodestroy(Post $post) {
        $post->delete();

        return redirect()->route('undex')->with('flash_message', '投稿を削除しました。');
    }
}


