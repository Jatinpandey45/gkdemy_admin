<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = "gk_category";

    protected $fillable = [
        'lang_id',
        'category_name',
        'category_slug',
        'category_description',
        'category_icon',
        'status'
    ];

    public function post()
    {
        return $this->belongsToMany('App\Posts','gk_category_post','category_id','post_id');
    }

    public static function getCategoryWisePost($id)
    {

      $category = Category::where(function($query) use ($id){

        if (is_numeric($id)) {

            $query->where('id', $id);

        } else {
            
            $query->where('category_slug', $id);
        }
        
    })->first();

      $categoryId = is_null($category) ? 0 : $category->id;

       $paginatedPost =  GkCategoryPost::with('post.Tags', 'post.Month', 'post.Seo')->where('category_id',$categoryId)->orderBy('created_at','DESC')->paginate(config('constants.PAGINATION_LIMIT'));
    
       return ['post' => $paginatedPost,'category' => $category];
    }

   

}
