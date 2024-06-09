<?php

namespace App\Http\Controllers;

use App\Jobs\FetchBlog;
use App\Models\BlogDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function get_blog()
    {
        FetchBlog::dispatch();
        return response()->json(['message' => 'Job dispatched'], 200);
    }

    public function get_categories()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://blogsapi.p.rapidapi.com/categories/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: blogsapi.p.rapidapi.com",
                "x-rapidapi-key: 28d2e8bc6emshb59bea3a157666ap103a18jsn88dfa5e1d039"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $data = json_decode($response, true);

        
    }
}
