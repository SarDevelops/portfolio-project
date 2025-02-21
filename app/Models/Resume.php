<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_title',
        'mobile_no',
        'email',
        'site_link',
        'address',
    ];
}