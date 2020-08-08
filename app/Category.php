<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'created_by', 'updated_by'];

    //MUTATOR
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    //ACCESSOR
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function article(){
        return $this->hasMany(Article::class)->where('status', 'PUBLISH');
    }
}
