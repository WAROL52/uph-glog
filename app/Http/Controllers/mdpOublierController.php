<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mdpOublierController extends Controller
{
    public function index()
    {
        $lien=[
            ["Se connecter","/login"],
            ["S'inscrire","/inscription"],
        ];
        if(Session::has('user')){
            $lien=[
                ["Se Deconnecter","/deconnection"]
            ];
        }
        return view('mdpOublier',[
            "lien"=>$lien
        ]);
    }
}
