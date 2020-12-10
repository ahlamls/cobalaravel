<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $articles = DB::select('select * from articles ORDER BY `id` DESC()');
        return view('welcome',['articles'=>$articles]);    
    }

    public function post() {
        
        return view('adminpost');   
    }

    public function insert(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::insert("INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `time`) VALUES (NULL, '0', '$title', '$content' , NOW())");
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
     }
}
