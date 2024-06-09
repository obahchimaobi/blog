<?php

namespace App\Http\Controllers;

use App\Models\BlogDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }

    public function getAll()
    {
        $all_blog = BlogDetails::paginate(6);

        return view('home', compact('all_blog'));
    }
}
