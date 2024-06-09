<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetails extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'category_id', 'category_title', 'category_desc', 'category_image', 'blog_title', 'blog_body', 'blog_tags', 'blog_image', 'blog_date'];
}
