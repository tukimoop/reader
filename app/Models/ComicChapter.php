<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed folder_hash
 * @property mixed name
 * @property mixed number
 * @property mixed slug
 */
class ComicChapter extends Model
{
    use Notifiable;

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

    /**
     * @return string
     */
    public function routeNotificationForWebhook()
    {
        return env('DISCORD_WEBHOOK');
    }
}
