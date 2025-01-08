<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Typetitle extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id';
    protected $table ='typetitles';
    protected $fillable = ['typetitle'];

    public function students()
    {
        // return $this->belongsTo(Students::class,'typetitles_id','id');
        return $this->hasMany(Students::class, 'typetitles_id', 'id');
    }
    public function studentsfather()
    {
        // return $this->belongsTo(Students::class,'typetitles_id','id');
        return $this->hasMany(Students::class, 'typetitlesfather_id', 'id');
    }
    public function studentsmother()
    {
        // return $this->belongsTo(Students::class,'typetitles_id','id');
        return $this->hasMany(Students::class, 'typetitlesmother_id', 'id');
    }
}
