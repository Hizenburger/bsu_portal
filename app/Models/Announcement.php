<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function user(): Belongsto
    {
        return $this->belongsTo(User::class);
    } 
}
