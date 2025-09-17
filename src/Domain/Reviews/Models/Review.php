<?php

namespace Src\Domain\Reviews\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Src\Domain\Users\Models\User;

class Review extends Model
{

    protected $fillable = [
        'title',
        'text',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
