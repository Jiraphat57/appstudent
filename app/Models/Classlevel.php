<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classlevel extends Model
{
    use HasFactory;
    
    protected $table ='classlevels';
    protected $fillable = ['classlevel'];

    public function students()
    {
        return $this->hasMany(Students::class, 'classlevels_id', 'id');
    }
}
// HasFactory;ไม่ใช้