<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

/**
 * @property mixed folder_hash
 * @property mixed id
 */
class Comic extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters()
    {
        return $this->hasMany(ComicChapter::class);
    }

    public function volumes()
    {
        return $this->hasMany(ComicVolume::class)->orderBy('order', 'asc');
    }

    public static function makeFolderHash($comicName)
    {
        return str_slug($comicName, '-') . '_' . Uuid::generate()->string;
    }
}
