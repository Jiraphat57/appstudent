<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schoolbreak extends Model
{
    use HasFactory;
    protected $table ='schoolbreaks';
    protected $fillable = ['schoolbreak'];

    public function students(): BelongTo
    {
        return $this->belongsTo(Students::class);
    }
}
