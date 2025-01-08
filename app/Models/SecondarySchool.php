<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SecondarySchool extends Model
{
    use HasFactory;

    protected $table ='secondaryschools';
    protected $fillable = ['curriculumsec'];

    public function curriculumSec1()
    {
        return $this->hasMany(Students::class, 'curriculumsec1_id', 'id');
    }
    public function curriculumSec2()
    {
        return $this->hasMany(Students::class, 'curriculumsec2_id', 'id');
    }
    public function curriculumSec3()
    {
        return $this->hasMany(Students::class, 'curriculumsec3_id', 'id');
    }

}
