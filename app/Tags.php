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

        return Tags::with('post.Category', 'post.Tags', 'post.Month', 'post.Seo')->paginate(10);
    }


    public static function getAllTagRelatedPostById($id)
    {

        $paginatedPost =  Tags::find($id)->with('post.Category', 'post.Tags', 'post.Month', 'post.Seo')->orderBy('created_at','DESC')->paginate(10);
        
        $tag = Tags::find($id);

        return ['post' => $paginatedPost,'tag' => $tag];

    }

    public static function searchTags($search)
    {
        return Tags::where('tag_name', 'LIKE', "%{$search}%")
            ->orWhere('tag_slug', 'LIKE', "%{$search}%")
            ->get();
    }
}
