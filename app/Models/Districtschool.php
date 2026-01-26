<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Districtschool extends Model
{
    use HasFactory;

    protected $table ='districtschools';
    protected $fillable = ['namedistric'];
    
    public function districtschools1()
    {
        return $this->hasMany(Students::class, 'districtschool1_id', 'id');
    }
    public function districtschools4()
    {
        return $this->hasMany(Students4::class, 'districtschool4_id', 'id');
    }
}
