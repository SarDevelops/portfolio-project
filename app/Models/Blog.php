<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'slug',
        'content',
        'image',
        'author',
        'tags',
    ];

}
