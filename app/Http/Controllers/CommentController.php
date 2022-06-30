<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store($article_id,$user_id,Request $request){

            Comment::create([
                'article_id'=>$article_id,
                'user_id'=>$user_id,
                'text'=>$request['comment'],
            ]);
            return back();
    }
}
