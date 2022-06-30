<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Craft;
use Illuminate\Http\Request;

class CraftController extends Controller
{
    //
    public function show(){
        $crafts = Craft::all();
        $categories = Category::all();
        return view('pages.crafts',compact('crafts','categories'));
    }
}
