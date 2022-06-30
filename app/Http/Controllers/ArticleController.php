<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function getMenu(){
        return Category::all();
    }
    public function index($category_name){
        $categories = $this->getMenu();
        $articles = Category::where('category_eng',$category_name)->get();
        return view('pages.mainpage',compact('articles','categories'));

    }
    public function show($category_id,Article $article){
        $categories = $this->getMenu();
//        dd($article->articleComments);
        return view('pages.showArticle',compact('article','categories'));
    }
}
