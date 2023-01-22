<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use宣言は外部にあるクラスをPostController内にインポートできる。
////この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
{
	return $post->get();//$postの中身を戻り値にする。
}

class PostController extends Controller
{
    //
}
