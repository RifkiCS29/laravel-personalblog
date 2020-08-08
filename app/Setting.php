<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['owner', 'bio', 'web_portfolio', 'fb', 'twitter', 'instagram'];
}
