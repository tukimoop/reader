<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
