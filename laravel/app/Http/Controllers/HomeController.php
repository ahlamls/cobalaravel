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
    
        return view('post',['articles'=>$articles , 'users' => $users]);   
    }
}
