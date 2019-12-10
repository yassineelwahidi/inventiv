<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title','text','created_by','is_published','published_by'];

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function publishedBy()
    {
        return $this->belongsTo('App\User','published_by');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','post_category', 'post_id', 'category_id');
    }

}
