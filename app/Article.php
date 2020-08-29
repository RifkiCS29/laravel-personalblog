<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $table = 'articles';

    //Accessor
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 'DRAFT') {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Publish</span>';
    }
    //SEDANGKAN INI ADALAH MUTATORS
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function publish_comments()
    {
        return $this->comments()->where('status', 'PUBLISH');
    }
}
