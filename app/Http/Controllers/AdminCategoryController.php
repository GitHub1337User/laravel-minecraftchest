<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.admin.allCategories', compact('categories'));
    }

    public function deleteCategory($id)
    {

        $category = Category::find($id);
        $articles = $category->articles;
        if ($articles) {
            for ($i = 0; $i != count($articles); $i++) {
                foreach ($articles[0]->sliderImages as $image) {
                    Storage::delete($image['image']);
                }
                Storage::delete($articles[$i]->preview);
                $category->delete();
            }
        }
        return back()->with('message', 'Удалено');
    }

    public function addCategory()
    {
        return view('pages.admin.add-category');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'category_rus' => ['required', 'string', 'max:20','unique:categories'],
            'category_eng' => ['required', 'string','max:20','unique:categories','regex:/^[a-zA-ZÑñ\s]+$/']
        ]);

        $newCategory = Category::create([
            'category_rus' => $request['category_rus'],
            'category_eng' => $request['category_eng']
        ]);

        return back()->with('message', 'Запись добавлена');
    }
    public function editCategory(Request $request,$category_id){
        $validatedData = $request->validate([
            'category_rus' => ['required', 'string', 'max:20','unique:categories'],
            'category_eng' => ['required', 'string','max:20','unique:categories','regex:/^[a-zA-ZÑñ\s]+$/']
        ]);
        $updatedCategory = Category::where('id',$category_id)->update([
            'category_rus' => $request['category_rus'],
            'category_eng' => $request['category_eng']
        ]);
        return back()->with('message', 'Запись обновлена');
    }
    public function toEditCategory($category_id){
        $category = Category::find($category_id);
        return view('pages.admin.edit-category',compact('category'));
    }
}
