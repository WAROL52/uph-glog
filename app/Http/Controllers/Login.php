<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index()
    {
        $lien=[
            ["S'inscrire","/inscription"],
        ];
        if(Session::has('user')){
            $lien=$lien=[
                ["Se Deconnecter","/deconnection"]
            ];
        }
        return view('login',[
            "lien"=>$lien
        ]);
    }
    public function login(Request $request)
    {
        $email=$request->input("email");
        $mdp=$request->input("mdp");
        $userSession=DB::select("SELECT * from user WHERE email=? and mdp=?",[$email,$mdp]);
        if(sizeof($userSession)){
            $userSession=$userSession[0];
            $request->session()->put("user",$userSession);
        }else{
            return redirect('/login');
        }
        return redirect('/');
    }
}
