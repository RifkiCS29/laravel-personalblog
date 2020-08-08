<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Article;

class LatestComposer
{
    public function compose(View $view)
    {
        //JADI QUERY TADI KITA PINDAHKAN KESINI
        $newest = Article::with(['category', 'comments'])->orderBy('created_at', 'DESC')->where('status', 'PUBLISH')->paginate(3);
      	//KEMUDIAN PASSING DATA TERSEBUT DENGAN NAMA VARIABLE CATEGORIES
        $view->with('newest', $newest);
    }
}