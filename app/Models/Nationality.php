<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nationality extends Model
{
    use HasFactory;
    protected $table ='nationalities';
    protected $fillable = ['nationalitie'];

    public function students()
    {
        return $this->hasMany(Students::class,'nationalities_id','id');
    }
}
