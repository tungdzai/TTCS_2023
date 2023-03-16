<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
class LanguageController extends Controller
{
    /** get session language
     * @param $language
     * @return \Illuminate\Http\RedirectResponse
     */

    public function index($language): \Illuminate\Http\RedirectResponse
    {
        if ($language) {
            session()->put('language',$language);
        }
        return redirect()->back();
    }
}

