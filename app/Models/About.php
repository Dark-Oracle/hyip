<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'uri',
        'content',
        'img',
        'is_active',
    ];
}
