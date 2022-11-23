<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
 

class userProfileController extends Controller
{
    public function index($id)
    {
        $user = DB::select('select * from user where id=?',[$id]);
        $posts= DB::select('select * from vue_post where id_user=?',[$id]);
        $lien=[
            ["Se connecter","/login"],
            ["S'inscrire","/inscription"],
        ];
        if(Session::has('user')){
            $lien=[
                ["Se Deconnecter","/deconnection"]
            ];
        }
        if (sizeof($user)){
            $user=$user[0];
            return view('userProfile',[
                "user"=>$user,
                "posts"=>$posts,
                "lien"=>$lien
            ]);
        }
        return "user not found" ;
    }
}
