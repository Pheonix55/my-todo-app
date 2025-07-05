<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_done',
        'created_by'
    ];
}
