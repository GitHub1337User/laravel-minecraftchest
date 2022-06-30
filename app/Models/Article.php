<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function version(){
        return $this->belongsTo(Version::class,'version_id','id');
    }
    public function sliderImages(){
        return $this->hasMany(Image::class,'article_id','id');
    }
    public function articleComments(){
        return $this->hasMany(Comment::class,'article_id','id');
    }
    public function shortContentAdmin()
    {
        return Str::limit($this->content, 50, ' (...)');
    }
}
