<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    public function SubCategory()
    {
        return $this->hasMany('App\Models\SubCategory','category_id','category_id');
    }

    public function SubSubCategory()
    {
        $obj=$this->hasManyThrough('App\Models\SubCategory', 'App\Models\SubSubCategory','category_id','sub_category_id','category_id');
       // ->join('sub_category', 'sub_category.category_id', '=', 'category.category_id');
        return $obj;

        //return $this->hasManyThrough('App\Models\SubCategory', 'App\Models\SubSubCategory','category_id','sub_category_id','category_id');
    }

    // $posts = Post::withCount(['votes', 'comments' => function ($query) {
    //     $query->where('content', 'like', 'foo%');
    // }])->get();

    // echo $posts[0]->votes_count;
    // echo $posts[0]->comments_count;
}
