<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
    use HasFactory;
    protected $guarded = false;
    public function version(){
        return $this->belongsTo(Version::class,'version_id','id');
    }

}
