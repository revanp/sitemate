<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_active'
    ];
}
