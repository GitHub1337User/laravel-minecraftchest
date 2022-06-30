<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'article_id',
        'user_id',
    ];
    public function articles(){
        return $this->belongsTo(Article::class,'article_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
