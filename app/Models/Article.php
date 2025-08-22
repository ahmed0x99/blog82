<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id',
        'time_to_read',
        'is_published',
        'published_at',
        'category_id'
    ];

    protected $table = "articles";

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
  
}
