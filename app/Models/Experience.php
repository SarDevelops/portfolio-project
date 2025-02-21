<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'company_name',
        'post',
        'start_time',
        'end_time',
        'description',
    ];
}