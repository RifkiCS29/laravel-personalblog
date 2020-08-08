<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Article;

class RandomComposer
{
    public function compose(View $view)
    {
        //JADI QUERY TADI KITA PINDAHKAN KESINI
        $random = Article::with(['category', 'comments'])->inRandomOrder()->where('status', 'PUBLISH')->paginate(3);
      	//KEMUDIAN PASSING DATA TERSEBUT DENGAN NAMA VARIABLE CATEGORIES
        $view->with('random', $random);
    }
}