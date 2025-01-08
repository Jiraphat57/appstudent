<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HighSchool extends Model
{
    use HasFactory;
    protected $table ='highschools';
    protected $fillable = ['curriculumhigh'];

    public function curriculumHigh1()
    {
        return $this->hasMany(Student4::class,'curriculumhigh1_id','id');
    }
    public function curriculumHigh2()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh2_id', 'id');
    }
    public function curriculumHigh3()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh3_id', 'id');
    }
    public function curriculumHigh4()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh4_id', 'id');
    }
    public function curriculumHigh5()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh5_id', 'id');
    }
    public function curriculumHigh6()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh6_id', 'id');
    }
    public function curriculumHigh7()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh7_id', 'id');
    }
    public function curriculumHigh8()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh8_id', 'id');
    }
    public function curriculumHigh9()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh9_id', 'id');
    }
    public function curriculumHigh10()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh10_id', 'id');
    }
    public function curriculumHigh11()
    {
        return $this->hasMany(Student4::class, 'curriculumhigh11_id', 'id');
    }
}
