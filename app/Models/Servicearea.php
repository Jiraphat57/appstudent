<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicearea extends Model
{
    use HasFactory;

    protected $table ='serviceareas';
    protected $fillable = ['name'];
    
    public function serviceareas1()
    {
        return $this->hasMany(Students::class, 'servicearea1_id', 'id');
    }
    public function serviceareas4()
    {
        return $this->hasMany(Students4::class, 'servicearea4_id', 'id');
    }
}
