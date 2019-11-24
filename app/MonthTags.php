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
       
    $paginatedPost =  Posts::with('Category', 'Tags', 'Month', 'Seo')->where('month_id',$id)->orderBy('created_at','DESC')->paginate(10);
        
    $month = MonthTags::find($id);

    return ['post' => $paginatedPost,'month' => $month];

    }
  
}
