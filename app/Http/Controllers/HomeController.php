<?php

namespace App\Http\Controllers;

use App\Models\BlogDetails;

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
        $weight_loss = BlogDetails::where('category_title', 'Weight Loss')->orderBy('id', 'Desc')->paginate(2);

        return view('home', compact('all_blog', 'weight_loss'));
    }
}
