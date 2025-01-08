<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Religion extends Model
{
    use HasFactory;
    protected $table ='religions';
    protected $fillable = ['religion'];

    public function students()
    {
        return $this->hasMany(Students::class,'religions_id','id');
    }
}
