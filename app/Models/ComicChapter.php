<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComicChapter extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volume()
    {
        return $this->belongsTo(ComicVolume::class, 'comic_volume_id', 'id');
    }
}
