<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GkCategoryPost extends Model
{
    protected $table = "gk_category_post";

    protected $fillable = [
        'category_id',
        'post_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
