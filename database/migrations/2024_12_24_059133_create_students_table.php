<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classlevels_id')->constrained('classlevels')->onUpdate('cascade')->onDelete('restrict');
            $table->string('numId');
            $table->foreignId('typetitles_id')->constrained('typetitles')->onUpdate('cascade')->onDelete('restrict');
            $table->string('name');
            $table->string('surname');
            $table->string('nameeng')->nullable();
            $table->string('surnameeng')->nullable();
            $table->string('nationalid')->nullable();
            $table->string('phone1student', 10)->nullable();
            $table->foreignId('religions_id')->constrained('religions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('nationalities_id')->constrained('nationalities')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('ethnicities_id')->constrained('ethnicities')->onUpdate('cascade')->onDelete('restrict');
            $table->date('dateofbirth');
            $table->foreignId('provincesbirth_id')->constrained('provinces')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('bloodtypes_id')->constrained('bloodtypes')->onUpdate('cascade')->onDelete('restrict');
            $table->string('weight', 5)->nullable();
            $table->string('height', 5)->nullable();
            $table->string('disability')->default(false);
            $table->string('previousschool')->nullable();
            $table->foreignId('provinceschool_id')->constrained('provinces')->onUpdate('cascade')->onDelete('restrict');
            $table->string('beingonlychild')->default(false);
            $table->string('brothers')->default(0);
            $table->string('youngerbrother')->default(0);
            $table->string('oldersister')->default(0);
            $table->string('sister')->default(0);
            $table->string('sumsiblings')->default(0);
            $table->string('houseid')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('villagenumber')->nullable();
            $table->string('villagename')->nullable();
            $table->string('district')->nullable();
            $table->string('subdistrict')->nullable();
            $table->foreignId('provinces_id')->constrained('provinces')->onUpdate('cascade')->onDelete('restrict');
            $table->string('postalcode', 10)->nullable();
            $table->foreignId('typeresidences_id')->constrained('typeresidences')->onUpdate('cascade')->onDelete('restrict');
            $table->string('distancelatyangroad', 8)->nullable();
            $table->string('traveltime')->nullable();
            $table->foreignId('travelschool1s_id')->constrained('travelschool1s')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('typetitlesfather_id')->constrained('typetitles')->onUpdate('cascade')->onDelete('restrict');//คำนำหน้าบิดา
            $table->string('name_father')->nullable();
            $table->string('surname_father')->nullable();
            $table->string('field_citizenfather')->nullable();
            $table->foreignId('occupationfather_id')->constrained('occupations')->onUpdate('cascade')->onDelete('restrict');
            $table->string('income_father', 10)->nullable();
            $table->string('phone_father', 10)->nullable();
            $table->foreignId('typetitlesmother_id')->constrained('typetitles')->onUpdate('cascade')->onDelete('restrict'); //คำนำหน้ามารดา
            $table->string('name_mother')->nullable();
            $table->string('surname_mother')->nullable();
            $table->string('field_citizenmother')->nullable();
            $table->foreignId('occupationmother_id')->constrained('occupations')->onUpdate('cascade')->onDelete('restrict');
            $table->string('income_mother', 10)->nullable();
            $table->string('phone_mother', 10)->nullable();
            $table->foreignId('maritalstatuses_id')->constrained('maritalstatuses')->onUpdate('cascade')->onDelete('restrict');
            $table->string('parent_id')->nullable();
            $table->foreignId('secondaryschool1_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool2_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool3_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool4_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool5_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool6_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool7_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('secondaryschool8_id')->nullable()->constrained('secondaryschools')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('servicearea1_id')->nullable()->constrained('serviceareas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('districtschool1_id')->nullable()->constrained('districtschools')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
