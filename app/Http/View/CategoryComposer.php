<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    public function compose(View $view)
    {
        //JADI QUERY TADI KITA PINDAHKAN KESINI
        $categories = Category::with('article')->orderBy('name', 'ASC')->get();
      	//KEMUDIAN PASSING DATA TERSEBUT DENGAN NAMA VARIABLE CATEGORIES
        $view->with('categories', $categories);
    }
}