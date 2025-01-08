<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ethnicity extends Model
{
    use HasFactory;
    
    protected $table ='ethnicities';
    protected $fillable = ['ethnicitie'];

    public function students()
    {
        // return $this->belongsTo(Students::class);
        return $this->hasMany(Students::class, 'ethnicities_id', 'id');
    }
}
