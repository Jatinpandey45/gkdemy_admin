<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthTags extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "gk_month_tags";

    protected $fillable = [
        'month_name',
        'month_slug',
        'month_desc'
    ];

    public function post()
    {
        return $this->belongsTo('App\Posts','id','month_id');
    }

    public static function getMonthlyWisePost($id)
    {
        return MonthTags::with('post.Category','post.Tags','post.Month','post.Seo')->paginate(10)->where('id',$id)->simplepaginate(10);

    }

    

    
}
