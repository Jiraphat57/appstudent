<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bloodtype;
use App\Models\Classlevel;
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
class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['classlevels_id','typetitles_id','name','surname','nameeng','surnameeng','nationalid','religions_id','nationalities_id','ethnicities_id','dateofbirth','provincesbirth_id','bloodtypes_id','travelschool1s_id','weight',
'height','disability','previousschool','provinceschool_id','beingonlychild','brothers','youngerbrother','oldersister','sister','sumsiblings','houseid','housenumber','villagenumber','villagename','district','subdistrict','provinces_id','postalcode','typeresidences_id','distancelatyangroad','traveltime',
'travelschool1s_id','typetitlesfather_id','name_father','surname_father','field_citizenfather','occupationfather_id','income_father','phone_father','typetitlesmother_id','name_mother','surname_mother','field_citizenmother','occupationmother_id','income_mother','phone_mother','maritalstatuses_id','parent_id',
'secondaryschool1_id','secondaryschool2_id','secondaryschool3_id'];

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
    public function curriculumsec1()
    {
        return $this->belongsTo(SecondarySchool::class, 'secondaryschool1_id', 'id');
    }
    public function curriculumsec2()
    {
        return $this->belongsTo(SecondarySchool::class, 'secondaryschool2_id', 'id');
    }
    public function curriculumsec3()
    {
        return $this->belongsTo(SecondarySchool::class, 'secondaryschool3_id', 'id');
    }
}
