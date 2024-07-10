<?php

namespace App\Http\Controllers;

use App\Jobs\FetchBlog;

class ApiController extends Controller
{
    //
    public function get_blog()
    {
        FetchBlog::dispatch();

        return response()->json(['message' => 'Job dispatched'], 200);
    }
}
