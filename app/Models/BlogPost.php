<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'body_fr',
        'user_id',
        'categories_id'
    ];

    public function blogHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function blogHasCategory()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categories_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
