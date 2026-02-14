<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;

class Post extends Model
{
    protected $fillable = ["title","content","img_url"];

    public static function boot()
    {
        parent::boot();
        
        static::creating(function($post){
            $post->slug = Str::slug($post->title);
            $slugCount = Post::where('slug', $post->slug)->count();
            if($slugCount > 0){
                $post->slug .= '-'.($slugCount+1);
            }
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}