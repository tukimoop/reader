<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed folder_hash
 * @property mixed name
 * @property mixed number
 * @property ChapterImage images
 * @property Volume volume
 */
class Chapter extends Model
{

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = [
        'release_date', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volume()
    {
        return $this->belongsTo(Volume::class, 'comic_volume_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ChapterImage::class, 'comic_chapter_id', 'id');
    }
}
