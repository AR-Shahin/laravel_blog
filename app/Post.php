<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','slug','category_id','admin_id','short_des','long_des','image','view_image','count','status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
