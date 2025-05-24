<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'answer',
        'date',
        'food',
        'remark',
    ];


    protected $casts = [
        'food' => 'array',
    ];
}
