<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $articles = DB::select('select * from articles ORDER BY `id` DESC');
        $users = DB::select("select * from user ");
    
        return view('welcome',['articles'=>$articles , 'users' => $users]);      
    }

    public function show($id) {
        $articles = DB::select("select * from articles WHERE `id` = $id");
        $users = DB::select("select * from user ");
        $comments = DB::select("select * from comment WHERE `post_id` = $id AND `hidden` = 0 ORDER BY `id` DESC");

        return view('post',['articles' => $articles , 'users' => $users , 'comments' => $comments]);   
    }

    public function handlecomment(Request $request) {
        
        $pid = $request->input('id');
        $name = $request->input('name');
        $comment = $request->input('comment');
        DB::update("UPDATE `articles` SET `commentcount` = `commentcount` + 1 WHERE `articles`.`id` = $pid;");
        DB::insert("INSERT INTO `comment` (`id`, `post_id`, `time`, `name`, `comment`, `hidden`) VALUES (NULL, '$pid', current_timestamp(), '$name', '$comment', '0');");
        return redirect("/post/" . $pid . "/#comment");
    } 
}
