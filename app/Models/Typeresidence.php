<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Typeresidence extends Model
{
    use HasFactory;
    protected $table ='typeresidences';
    protected $fillable = ['typeresidence'];

    public function students()
    {
        return $this->hasMany(Students::class,'typeresidences_id', 'id');
    }
}
