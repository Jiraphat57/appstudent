<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Occupation extends Model
{
    use HasFactory;
    protected $table ='occupations';
    protected $fillable = ['occupation'];

    public function occupationFather()
    {
        return $this->hasMany(Students::class,'occupationfather_id','id');
    }
    public function occupationMother()
    {
        return $this->hasMany(Students::class, 'occupationmother_id', 'id');
    }
}