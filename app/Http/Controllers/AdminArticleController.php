<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function showByCategory($category_name)
    {
        $articles = Category::where('category_eng', $category_name)->get();
        return view('pages.admin.allArticles', compact('articles', 'category_name'));
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        if ($article) {
            foreach ($article->sliderImages as $image){
                Storage::delete($image['image']);
            }
            Storage::delete($article->preview);
            $article->delete();
        }
        return back()->with('message', 'Удалено');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
            'content' => ['required', 'string'],
            'download_link' => ['required', 'string', 'min:5'],
            'preview' => ['required'],
        ]);

        $path = $request->file('preview')->store('images');
        $newArticle = Article::create([
            'title' => $request['title'],
            'category_id' => $request['category'],
            'content' => $request['content'],
            'download_link' => $request['download_link'],
            'preview' => $path,
            'version_id' => '1',
            'user_id' => Auth::user()->id,
        ]);
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $image) {
                Image::create([
                    'article_id' => $newArticle->id,
                    'image' => $image->store('images'),
                ]);
            }
        }
        return back()->with('message', 'Запись добавлена');

    }

    public function addArticle($category_id)
    {
        $categories = Category::all();
        return view('pages.admin.add-article', compact('categories', 'category_id'));
    }
    public function editArticle(Request $request,$article_id){
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
            'content' => ['required', 'string'],
            'download_link' => ['required', 'string', 'min:5'],
        ]);
        if(!empty($request['picsForDelete'])){
            foreach ($request['picsForDelete'] as $picId){
                $picForDelete = Image::find($picId);
                Storage::delete($picForDelete->image);
                $picForDelete->delete();

            }
        }
        $updatedArticle = Article::where('id',$article_id);
        if($request->hasFile('preview')){
            $path= $request->file('preview')->store('images');
        }
        else{
            $path = $updatedArticle->get();
            $path = $path[0]->preview;

        }
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $image) {
                Image::create([
                    'article_id' => $article_id,
                    'image' => $image->store('images'),
                ]);
            }
        }

        $updatedArticle->update([
            'title' => $request['title'],
            'category_id' => $request['category'],
            'content' => $request['content'],
            'download_link' => $request['download_link'],
            'preview' => $path,
            'version_id' => '1',
        ]);
        return back()->with('message', 'Запись обновлена');

    }
    public function toEditArticle($article_id){
        $categories = Category::all();
        $article = Article::find($article_id);
        return view('pages.admin.edit-article',compact('categories','article'));
    }

}
