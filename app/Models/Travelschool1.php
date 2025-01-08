<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Travelschool1 extends Model
{
    use HasFactory;
    protected $table ='travelschool1s';
    protected $fillable = ['nametravelschool'];
    
    public function students()
    {
        return $this->hasMany(Students::class,'travelschool1s_id', 'id');
    }
}
