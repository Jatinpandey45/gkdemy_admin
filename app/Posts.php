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

    public function getCategoryMap()
    {
        return $this->belongsTo(GkCategoryPost::class,'id','post_id');
    }

    public function getMonth()
    {
        return $this->belongsTo('App\MonthTags','month_id','id');
    }

    public function getSeo()
    {
        return $this->hasOne(PostSeo::class,'post_id','id');
    }


    public static function getCompletePostData()
    {
        return Posts::with(['getCategoryMap.getCategory','getMonth','getSeo'])->simplePaginate(10);

    }
}
