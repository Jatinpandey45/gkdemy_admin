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

        $month = MonthTags::where('id',$id)->orWhere('month_slug',$id)->first();
       
        $monthId = is_null($month->id) ? 0 : $month->id;
        
        $paginatedPost =  Posts::with('Category', 'Tags', 'Seo')->where('month_id',$monthId)->orderBy('created_at','DESC')->paginate(10);
        
        return ['post' => $paginatedPost,'month' => $month];

    }
  
}
