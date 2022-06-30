<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('pages.admin.main',compact('categories'));
    }


}
