<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comics()
    {
        return $this->hasMany(Comic::class);
    }
}
