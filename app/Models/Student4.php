<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bloodtype;
use App\Models\Classlevel;
// use App\Models\Datafather;
// use App\Models\Datamother;
use App\Models\Ethnicity;
use App\Models\Maritalstatus;
use App\Models\Nationality;
use App\Models\Occupation;
use App\Models\Province;
use App\Models\Religion;
use App\Models\Schoolbreak;
use App\Models\Travelschool1;
use App\Models\Typeresidence;
use App\Models\Typetitle;
use App\Models\SecondarySchool;
use App\Models\HighSchool;


class Student4 extends Model
{
    use HasFactory;
    protected $table = 'student4s';
    protected $fillable = ['classlevels_id','typetitles_id','name','surname','nameeng','surnameeng','nationalid','phone4student','religions_id','nationalities_id','ethnicities_id','dateofbirth','provincesbirth_id','bloodtypes_id','travelschool1s_id','weight',
'height','disability','previousschool','provinceschool_id','beingonlychild','brothers','youngerbrother','oldersister','sister','sumsiblings','houseid','housenumber','villagenumber','villagename','district','subdistrict','provinces_id','postalcode','typeresidences_id','distancelatyangroad','traveltime',
'travelschool1s_id','typetitlesfather_id','name_father','surname_father','field_citizenfather','occupationfather_id','income_father','phone_father','typetitlesmother_id','name_mother','surname_mother','field_citizenmother','occupationmother_id','income_mother','phone_mother','maritalstatuses_id','parent_id',
'highschool1_id','highschool2_id','highschool3_id','highschool4_id','highschool5_id','highschool6_id','highschool17_id','highschool8_id','highschool9_id','highschool10_id'];

    public function travelschool1(): BelongsTo
    {
        return $this->belongsTo(Travelschool1::class, 'travelschool1s_id', 'id');
    }
    public function typetitle(): BelongsTo
    {
        return $this->belongsTo(Typetitle::class, 'typetitles_id', 'id');
    }
    public function typetitlefather(): BelongsTo
    {
        return $this->belongsTo(Typetitle::class, 'typetitlesfather_id', 'id');//พ่อ
    }
    public function typetitlemother(): BelongsTo
    {
        return $this->belongsTo(Typetitle::class, 'typetitlesmother_id', 'id');//แม่
    }
    public function ethnicity(): BelongsTo
    {
        return $this->belongsTo(Ethnicity::class, 'ethnicities_id', 'id');
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class, 'nationalities_id', 'id');
    }
    // public function religion(): HasMany
    // {
    //     return $this->hasMany(Religion::class, 'religions_id', 'id');
    // }
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religions_id', 'id');
    }  
    public function provincebirth(): BelongsTo // province ของจังหวัดเกิด provincesbirth_id
    {
        return $this->belongsTo(Province::class, 'provincesbirth_id', 'id');
    }
    public function provinceschool(): BelongsTo // provinceschool ของจังหวัดโรงเรียนเดิม  provinceschool_id
    {
        return $this->belongsTo(Province::class, 'provinceschool_id', 'id');
    }
    public function provincesaddress(): BelongsTo // provinceschool ของจังหวัดโรงเรียนเดิม  provinceschool_id
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }
    public function classlevel(): BelongsTo
    {
        return $this->belongsTo(Classlevel::class, 'classlevels_id', 'id');
    }
    public function schoolbreak(): HasMany
    {
        return $this->hasMany(Schoolbreak::class, 'schoolbreak_id', 'id');
    }
    public function maritalstatus(): BelongsTo
    {
        return $this->belongsTo(Maritalstatus::class, 'maritalstatuses_id', 'id');
    }
    public function bloodtype(): BelongsTo
    {
        return $this->belongsTo(Bloodtype::class, 'bloodtypes_id', 'id');
    }
    public function typeresidence(): BelongsTo
    {
        return $this->belongsTo(Typeresidence::class, 'typeresidences_id', 'id');
    }
    // occupationfather_id
    public function occupationfather(): BelongsTo
    {
        return $this->belongsTo(Occupation::class, 'occupationfather_id', 'id');
    }
    public function occupationmother(): BelongsTo
    {
        return $this->belongsTo(Occupation::class, 'occupationmother_id', 'id');
    }
    //
    // public function highschool(): BelongsTo
    // {
    //     return $this->belongsTo(HighSchool::class, 'highschool_id', 'id');
    // }
    public function highschool1(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool1_id', 'id');
    }
    public function highschool2(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool2_id', 'id');
    }
    public function highschool3(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool3_id', 'id');
    }
    public function highschool4(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool4_id', 'id');
    }
    public function highschool5(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool5_id', 'id');
    }
    public function highschool6(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool6_id', 'id');
    }
    public function highschool7(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool7_id', 'id');
    }
    public function highschool8(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool8_id', 'id');
    }
    public function highschool9(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool9_id', 'id');
    }
    public function highschool10(): BelongsTo
    {
        return $this->belongsTo(HighSchool::class, 'highschool10_id', 'id');
    }
    // public function highschool11(): BelongsTo
    // {
    //     return $this->belongsTo(HighSchool::class, 'highschool11_id', 'id');
    // }
    // public function curriculumsec()
    // {
    //     return $this->hasMany(SecondarySchool::class, 'curriculumsec_id', 'id');
    // }
}