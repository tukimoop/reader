<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed folder_hash
 * @property mixed name
 * @property mixed number
 * @property ComicChapterImage images
 */
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
        'release_date', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volume()
    {
        return $this->belongsTo(ComicVolume::class, 'comic_volume_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ComicChapterImage::class);
    }
}
