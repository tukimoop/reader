<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed short_code
 */
class Language extends Model
{

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
