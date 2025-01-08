<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maritalstatus extends Model
{
    use HasFactory;
    
    protected $table ='maritalstatuses';
    protected $fillable = ['maritalstatuse'];

    public function students()
    {
        return $this->hasMany(Students::class);
    }
}
