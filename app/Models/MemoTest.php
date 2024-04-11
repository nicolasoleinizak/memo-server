<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemoTest extends Model
{
    use HasFactory;

    public function images(): HasMany {
        return $this->hasMany(MemoTestImage::class);
    }

    public function gameSessions(): HasMany {
        return $this->hasMany(GameSession::class);
    }
}
