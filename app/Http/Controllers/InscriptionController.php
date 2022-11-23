<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

use Illuminate\Support\Facades\DB;
class InscriptionController extends Controller
{
    public function index()
    {
        
        return view('inscription',[
            "lien"=>[
                ["Se connecter","/login"],
            ]
        ]);
    }
    public function inscription(Request $request)
    {
        DB::insert("INSERT INTO user (nom,prenom,email,mdp,date_naissance,sexe,img)
        VALUES (?,?,?,?,?,?,?);",[
            $request->input('nom'),
            $request->input('prenom'),
            $request->input('email'),
            $request->input('mdp'),
            $request->input('date_naissance'),
            $request->input('sexe'),
            "",
        ]);

        return redirect('/login');
    }
}
