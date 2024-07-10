<?php

namespace App\Jobs;

use App\Models\BlogDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class FetchBlog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //

        $pages = [1, 2, 3];

        foreach ($pages as $page) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://blogsapi.p.rapidapi.com/?page={$page}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'x-rapidapi-host: blogsapi.p.rapidapi.com',
                    'x-rapidapi-key: 19712ae800msh39302756eeef1abp1b8019jsnc7967b2210ac',
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if ($err) {
                echo 'cURL Error #:'.$err;
            }

            $data = json_decode($response, true);

            if (isset($data['results']) && is_array($data['results'])) {

                foreach ($data['results'] as $result) {
                    $blog_id = $result['id'];

                    // check if blog exists

                    $fetch_blog = BlogDetails::where('blog_id', $blog_id)->first();

                    if (! $fetch_blog) {
                        $category_id = $result['category']['id'];
                        $category_title = $result['category']['title'];
                        $category_desc = $result['category']['categoryDesc'];
                        $category_image = $result['category']['categoryImage'];

                        $blog_title = $result['title'];
                        $blog_body = $result['body'];
                        $blog_tags = $result['tags'];
                        $blog_image = $result['image'];

                        BlogDetails::create([
                            'blog_id' => $blog_id,
                            'category_id' => $category_id,
                            'category_title' => $category_title,
                            'category_desc' => $category_desc,
                            'category_image' => $category_image,
                            'blog_title' => $blog_title,
                            'blog_body' => $blog_body,
                            'blog_tags' => $blog_tags,
                            'blog_image' => $blog_image,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                        ]);

                        echo 'Blog with id '.$blog_id." has been inserted \n";
                    }
                }
            } else {
                echo 'Unable to fetch data: '.$err."\n";
            }
        }
    }
}
