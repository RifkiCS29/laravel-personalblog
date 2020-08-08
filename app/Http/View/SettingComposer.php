<?php

namespace App\Http\View;

use Illuminate\View\View;
use App\Setting;

class SettingComposer
{
    public function compose(View $view)
    {
        $setting = Setting::find(1);
        $view->with('setting', $setting);
    }
}