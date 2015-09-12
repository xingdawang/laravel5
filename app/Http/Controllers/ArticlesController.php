<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(){
        $articles = Article::latest()->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id){
        $article = Article::findOrFail($id);
        if(is_null($article))
            abort(404);
        return view('articles.show', compact('article'));
    }

    public function create(){

        if(Auth::guest()){
            return redirect('articles');
        }
        return view('articles.create');
    }


    public function store(Requests\CreateArticleRequest $request){

        $article = new Article($request->all());
        Auth::user()->articles()->save($article);
        return redirect('articles');
    }

    /*
    public function store(Request $request){

        $this->validate($request, ['title' => 'required | min:3', 'body' => 'required']);
        Article::create($request->all());
        return redirect('articles');
    }
    */

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id, Requests\CreateArticleRequest $request){
        $article = Article::find($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
