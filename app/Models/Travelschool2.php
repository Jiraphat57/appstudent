<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Travelschool2 extends Model
{
    use HasFactory;
    protected $fillable = ['traveltime','distancewaterway','distancelukrangroad','distancelatyangroad'];

    public function users(): BelongTo
    {
        return $this->belongsTo(User::class);
    }
}
