<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\MonthTags;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\GkCategoryPost;
use App\PostSeo;

class Posts extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "gk_posts";

    protected $fillable = [
        'post_title',
        'post_desc',
        'month_id',
        'lang_id',
        'emp_id',
        'post_slug',
        'featured_image',
        'publish_at',
        'status',
        'publish_status',
        'target_device'
    ];

    public function Category()
    {
        return $this->belongsToMany('App\Category','gk_category_post','post_id','category_id');
    }

    public function Month()
    {
        return $this->belongsTo('App\MonthTags','month_id','id');
    }

    public function Seo()
    {
        return $this->hasOne(PostSeo::class,'post_id','id');
    }


    public static function getCompletePostData()
    {
        return Posts::with(['Category','Month','Seo'])->simplePaginate(10);

    }
}
