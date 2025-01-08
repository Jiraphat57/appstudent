<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Province extends Model
{
    use HasFactory;
    protected $table ='provinces';
    protected $fillable = ['province'];

    public function studentsBirth()
    {
        return $this->hasMany(Students::class,'provincesbirth_id','id');
    }
    public function studentsSchool()
    {
        return $this->hasMany(Students::class, 'provinceschool_id', 'id');
    }
    public function studentsProvince()
    {
        return $this->hasMany(Students::class, 'provinces_id', 'id');
    }
}
