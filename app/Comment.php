<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function publish_child()
    {
        return $this->child()->where('status', 'PUBLISH');
    }
    
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 'DRAFT') {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Publish</span>';
    }
}
