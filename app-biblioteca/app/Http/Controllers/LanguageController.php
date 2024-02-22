<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        setLanguageSession($request->route('language'));

        return back();
    }
}
