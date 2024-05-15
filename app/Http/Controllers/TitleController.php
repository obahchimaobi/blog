<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitleController extends Controller
{
    //
    public function title()
    {
        return view('components.title');
    }
}
