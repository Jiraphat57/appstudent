<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bloodtype extends Model
{
    use HasFactory;
    protected $table ='bloodtypes';
    protected $fillable = ['bloodtype'];
    
    public function students()
    {
        return $this->hasMany(Students::class);
    }

    // public function datafathers():HasMany
    // {
    //     return $this->hasMany(Datafather::class,'bloodtypes_id','id');
    // }

    // public function datamothers():HasMany
    // {
    //     return $this->hasMany(Datamother::class,'bloodtypes_id','id');
    // }
}       
    