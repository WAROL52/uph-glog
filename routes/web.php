<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Json;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = DB::select('select * from vue_post limit 10 ');
    // $posts = DB::select('select * from vue_post');
    $lien = [
        ["Se connecter", "/login"],
        ["S'inscrire", "/inscription"],
    ];
    if (Session::has('user')) {
        $lien = [
            ["Se Deconnecter", "/deconnection"]
        ];
    }
    return view('welcome', [
        'indexPage' => 1,
        "posts" => $posts,
        "lien" => $lien
    ]);
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\Login::class, 'index'])->name('home');

Route::get('/deconnection', function () {
    $user = null;
    if (Session::has('user')) {
        $user = Session::pull('user');
    }
    return redirect('/');
})->name('home');
Route::post('/login', [App\Http\Controllers\Login::class, 'login'])->name('home');
Route::post('/add-post-commentaire/{idUser}/{idPost}', function (Request $request, $idUser, $idPost) {
    DB::insert("INSERT INTO commentaire (text,id_post,id_user) VALUES (?,?,?)", [$request->texte, $idPost, $idUser]);
    $post = DB::select('select * from vue_post where  idpost= ?', [$idPost])[0];
    $commentaire = DB::select('select * from commentaire where  id_post= ? and id_user=? order by id desc', [$idPost, $idUser]);
    $commentaire = $commentaire[0];
    // return [
    //     "user"=>Session::get('user'),
    //     "post"=>$post,
    //     "commentaire"=>$commentaire
    // ];
    return redirect("/");
})->name('home');

Route::post('/add-reponse-commentaire/{idpost}-{idCommentaire}', function (Request $request, $idpost, $idCommentaire) {
    $user = Session::get('user');
    DB::insert("INSERT INTO commentaire (text,id_post,id_commentaire,id_user) VALUES (?,?,?,?)", [$request->texte, $idpost, $idCommentaire, $user->id]);
    return redirect("/");
})->name('home');
Route::post('/update-reponse-commentaire/{idCommentaire}', function (Request $request, $idCommentaire) {
    $user = Session::get('user');
    DB::insert("UPDATE commentaire
    SET text = ?
    WHERE id=?", [$request->texte, $idCommentaire]);
    return redirect("/");
})->name('home');
Route::get('/delete-reponse-commentaire/{idCommentaire}', function ($idCommentaire) {
    $user = Session::get('user');
    DB::insert("DELETE FROM commentaire
    WHERE id=?", [$idCommentaire]);
    return redirect("/");
})->name('home');
Route::post('/post', function (Request $request) {
    $user = Session::get('user');
    if ($user) {
        DB::insert("INSERT INTO post (titre,content,id_user) VALUES (?,?,?)", [$request->titre, $request->content, $user->id]);
    }
    return redirect('/');
})->name('home');
Route::get('/add-jaime-post/{idPost}', function ($idPost) {
    $user = Session::get('user');
    if ($user) {
        DB::insert("INSERT INTO jaimes_post (aimer_par,id_post) VALUES (?,?)", [$user->id, $idPost]);
    }
    return redirect('/');
})->name('home');
Route::get('/remove-jaime-post/{idJaime}', function ($idJaime) {
    $user = Session::get('user');
    if ($user) {
        DB::insert("DELETE FROM jaimes_post
        WHERE id=?", [$idJaime]);
    }
    return redirect('/');
})->name('home');
Route::get('/add-jaime-commentaire/{idUSer}-{idCommentaire}', function ($idUSer, $idCommentaire) {
    DB::insert("INSERT INTO jaime_commentaire (aimer_par,id_com) VALUES (?,?)", [$idUSer, $idCommentaire]);
    return redirect('/');
})->name('home');
Route::get('/delete-jaime-commentaire/{idJaime}', function ($idJaime) {
    DB::insert("DELETE FROM jaime_commentaire
    WHERE id=?", [$idJaime]);
    return redirect('/');
})->name('home');
Route::get('/inscription', [App\Http\Controllers\InscriptionController::class, 'index'])->name('home');
Route::post('/inscription', [App\Http\Controllers\InscriptionController::class, 'inscription'])->name('home');
Route::get('/mdp-oublier', [App\Http\Controllers\mdpOublierController::class, 'index'])->name('home');
Route::get('/user/{id}', [App\Http\Controllers\userProfileController::class, 'index'])->name('home');
Route::get('/post/page/{indexPage}', function ($indexPage) {
    $posts = DB::select('select * from vue_post limit ?,10', [intval($indexPage) * 10]);
    return view('welcome', [
        'indexPage' => $indexPage,
        "posts" => $posts,
        "lien" => [
            ["Se connecter", "/login"],
            ["S'inscrire", "/inscription"],
        ]
    ]);
});