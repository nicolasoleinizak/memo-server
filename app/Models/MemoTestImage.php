<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemoTestImage extends Model
{
    use HasFactory;

    public function memoTest(): BelongsTo {
        return $this->belongsTo(MemoTest::class);
    }
}
