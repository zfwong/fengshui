<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function changeLocale($lang)
    {
        session(['locale' => $lang]);
        return back();
    }
}
