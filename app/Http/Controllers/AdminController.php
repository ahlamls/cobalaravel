<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;

class AdminController extends Controller
{
     /**
 * Create a new controller instance.
 *
 * @return void
 */ 
    public function __construct()
    {
       // session()->regenerate();
    }

    public function login(Request $request) {
        if ($request->session()->pull('uid', '0') != 0) {
            return redirect('/admin');
        } else {
            return view("auth/login",['alert' => ""]); 
        }
    }

    public function checkLogin($request) {
        $data = $request->session()->all();
        
        if (isset($data['uid'])) {
            $uid =  $data['uid'];
            
        } else {
            $uid = 0;
        }
        if ($uid == 0) {
           header("Location: /admin/login");
           die();
        }
        return $uid;
    }

    public function handlelogin(Request $request) {
        $username = $request->input('username');
        $password = hash('sha512',$request->input('password'));
        $users = DB::select("select * from user WHERE `username` = '$username' AND `password` = '$password' LIMIT 0,1");
        $exist = false;
        $uid = 0; 
        foreach ($users as $user) {
            $exist = true;
            $uid = $user->id;
        }

        if ($exist) {
            $request->session()->put('uid', $uid);
            return redirect('/admin');
        } else {
            return view("auth/login",['alert' => "Wrong Username or Password . Please Try Again"]); 
        }
      
    }
    
    public function index(Request $request){
        
        $uid = $this->checkLogin($request);

        $users = DB::select("select * from user WHERE `id` = $uid LIMIT 0,1");
        $name = "";
        foreach ($users as $user) {
            $name = $user->name;
        }
        return view('adminhome',['name'=>$name]);    
    }

    public function post(Request $request) {
        $uid = $this->checkLogin($request);
        return view('adminpost');   
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    public function list(Request $request) {
        $uid = $this->checkLogin($request);
        $articles = DB::select("SELECT * FROM `articles`");
      
        return view('adminlist',["articles" => $articles]);   
    }

    public function edit(Request $request,$id) {
        $uid = $this->checkLogin($request);
        $articles = DB::select("SELECT * FROM `articles` WHERE `id` = $id LIMIT 0,1");
      
        return view('adminedit',["articles" => $articles]);   
    }

    public function delete(Request $request,$id) {
        $uid = $this->checkLogin($request);
        $articles = DB::select("SELECT * FROM `articles` WHERE `id` = $id LIMIT 0,1");
      
        return view('admindelete',["articles" => $articles]);   
    }

    public function handleedit(Request $request) {
        $uid = $this->checkLogin($request);
        $id = $request->input("id");
        $title = $request->input('title');
        $content = $request->input('content');
        DB::update("UPDATE `articles` SET `title` = '$title' , `content` = '$content' WHERE `articles`.`id` = $id;");
        return redirect('/admin/list');
    }

    public function handledelete(Request $request,$id) {
        $uid = $this->checkLogin($request);
        DB::delete("DELETE FROM `articles` WHERE `articles`.`id` = $id");
        return redirect('/admin/list');
    }


    public function insert(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $file = $request->file('file');
        $uid = $this->checkLogin($request);
        $title = $request->input('title');
        $content = $request->input('content');
        if ($file !== null) {
           $extension = $file->getClientOriginalExtension();
           if ($extension == "php" OR $extension == "html" OR $extension == "asp" OR $extension == "aspx" OR $extension == "php2" OR $extension == "php3" OR $extension == "php4" OR $extension == "php5" OR $extension == "htm") {
               die("<h1>Deface Attempt Detected!</h1>");
           }
           if ($extension == "png" OR $extension == "jpg" OR $extension =="jpeg" OR $extension = "gif") {
            $filename = base64_encode($file->getClientOriginalName()) . "." . $extension;
            $file->move("thumb",$filename);
            $image_url = "'/public/thumb/" . $filename . "'";
           } else {
               $image_url == "NULL";
           }
        } else {
            $image_url = "NULL";
        }
        DB::insert("INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `time`,`image_url`) VALUES (NULL, '$uid', '$title', '$content' , NOW() , $image_url)");
        return redirect('/admin/list');
     }
}
