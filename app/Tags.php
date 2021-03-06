<?php

namespace App;

use App\Lang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "gk_tags";

    protected $fillable = [
        'lang_id',
        'tag_name',
        'tag_slug',
        'tag_desc'
    ];

    public function getLang()
    {
        return $this->belongsTo(Lang::class);
    }

    public function post()
    {
        return $this->belongsToMany('App\Posts', 'gk_tag_post', 'tag_id', 'post_id');
    }

    public static function getAllTagRelatedPost()
    {

        return Tags::with('post.Category', 'post.Tags', 'post.Month', 'post.Seo')->paginate(config('constants.PAGINATION_LIMIT'));
    }


    public static function getAllTagRelatedPostById($id)
    {

     
        $tag = Tags::where(function($query) use ($id){

            if (is_numeric($id)) {

                $query->where('id', $id);

            } else {
                
                $query->where('tag_slug', $id);
            }
            
        })->first();
       
       
        $tagId = is_null($tag) ? 0 : $tag->id;

        $paginatedPost = GkTagPost::with('post.Category','post.Month', 'post.Seo')->where('tag_id',$tagId)->paginate(config('constants.PAGINATION_LIMIT'));
        
        return ['post' => $paginatedPost,'tag' => $tag];

    }

    public static function searchTags($search)
    {
        return Tags::where('tag_name', 'LIKE', "%{$search}%")
            ->orWhere('tag_slug', 'LIKE', "%{$search}%")
            ->get();
    }
}
