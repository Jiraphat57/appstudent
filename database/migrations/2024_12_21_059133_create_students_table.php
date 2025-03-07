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
        // if(!Schema::hasTable('students')) {
        // Schema::create('students', function (Blueprint $table) {
        //     $table->id();
        //     // $table->string('studentid',5);    //รหัสนักเรียน 5หลัก
        //     $table->string('name',60);   //ชื่อนักเรียน
        //     $table->string('surname',60);   //นามสกุลนักเรียน
        //     $table->string('nameeng',60);   //ชื่อนักเรียนภาษาอังกฤษ
        //     $table->string('surnameeng',60);   //นามสกุลนักเรียนภาษาอังกฤษ
        //     // $table->date('enrollmentdate');   //วันที่เข้าเรียน
        //     $table->string('nationalid',13);   //รหัสประชาชน 13 หลัก
        //     // $table->string('semester',1);   //ภาคเรียนที่
        //     // $table->string('academicyear',4);   //ปีการศึกษา
        //     $table->date('dateofbirth');   //วันเดือนปีเกิด
        //     $table->string('weight',3);   //น้ำหนัก
        //     $table->string('height',3);   //ส่วนสูง
        //     $table->string('disability',40);   //ความพิการ
        //     $table->string('previousschool',40);   //โรงเรียนเดิมที่จบมา
        //     // $table->string('previousschool',40);   //โรงเรียนเดิมที่จบมา
        //     $table->string('beingonlychild',2);   //นักเรียนเป็นบุตรคนที่
        //     $table->string('brothers',2);   //จำนวนพี่ชาย
        //     $table->string('youngerbrother',2);   //จำนวนน้องชาย
        //     $table->string('oldersister',2);   //จำนวนพี่สาวพี่สาว
        //     $table->string('sister',2);   //จำนวนน้องสาว
        //     $table->string('sumsiblings',2);   //จำนวนพี่น้องที่กำลังเรียนอยู่
        //     $table->string('houseid',11);   //รหัสประจำบ้าน
        //     $table->string('housenumber',10);   //บ้านเลขที่
        //     $table->string('villagenumber',10);   //หมู่ที่
        //     $table->string('villagename',40);   //ชื่อหมู่บ้าน
        //     $table->string('district',40);   //อำเภอ
        //     $table->string('subdistrict',40);   //ตำบล
        //     $table->string('postalcode',6);   //รหัสไปรษณีย์
        //     $table->string('distancelatyangroad',30);   //ชื่ที่พักห่างโรงเรียนเป็นกี่เมตร(1km=1000m)
        //     $table->string('traveltime',30);   //ใช้เวลาเดินทางมาโรงเรียนกี่นาทีฆ
        //     $table->string('name_father',30);   //ชื่อบิดา
        //     $table->string('surname_father',30);   //นามบิดา
        //     $table->string('field_citizenfather',13);   //รหัสประชาชนของบิดา
        //     $table->string('income_father',30);   //รายได้ต่อเดือน(บาท)
        //     $table->string('phone_father',10);   //หมายเลขโทรศัพท์ของบิดา
        //     $table->string('name_mother',30);   //ชื่อมารดา
        //     $table->string('surname_mother',30);   //นามบิดา
        //     $table->string('field_citizenmother',13);   //รหัสประชาชนของมารดา
        //     $table->string('income_mother',30);   //รายได้ต่อเดือน(บาท)
        //     $table->string('phone_mother',10);   //หมายเลขโทรศัพท์ของบิดา

        //     $table->timestamps();
        // });
        // }
        // Schema::table('students', function (Blueprint $table) {
        //     $table->foreignId('typetitles_id') //คำนำหน้าชื่อ
        //     ->constrained('typetitles')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('ethnicities_id')       //เชื้อชาติ
        //     ->constrained('ethnicities')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('nationalities_id')       //สัญชาติ
        //     ->constrained('nationalities')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('religions_id')       //ศาสนา
        //     ->constrained('religions')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('provincesbirth_id')       //จังหวัดที่เกิด
        //     ->constrained('provinces')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('provinces_id')       //จังหวัด
        //     ->constrained('provinces')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('provinceschool_id')       //โรงเรียนที่จบมาอยู่จังหวัด
        //     ->constrained('provinces')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('occupationfather_id')       //พ่อ
        //     ->constrained('occupations')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('occupationmother_id')       //แม่
        //     ->constrained('occupations')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('bloodtypes_id')       //เลือด
        //     ->constrained('bloodtypes')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('travelschool1s_id')       //การเดินทางมาโรงเรียน
        //     ->constrained('travelschool1s')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('maritalstatuses_id')       //สถานะของบิดามารดา
        //     ->constrained('maritalstatuses')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('classlevels_id')       //ม ที่สมัครเข้าเรียน
        //     ->constrained('classlevels')
        //     ->onUpdate('cascade')->onDelete('restrict');
        //     $table->foreignId('typeresidences_id')       //ลักษณะที่พักของนักเรียน เช่น บ้านตัวเอง
        //     ->constrained('typeresidences')
        //     ->onUpdate('cascade')->onDelete('restrict');
            // $table->foreignId('occupations_id') //อาชีพของพ่อแม่
            // ->constrained('occupations')
            // ->onUpdate('cascade')->onDelete('restrict');
        // });
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classlevels_id')->constrained('classlevels')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('typetitles_id')->constrained('typetitles')->onUpdate('cascade')->onDelete('restrict');
            $table->string('name');
            $table->string('surname');
            $table->string('nameeng')->nullable();
            $table->string('surnameeng')->nullable();
            $table->string('nationalid')->nullable();
            $table->string('phonestudent1', 10)->nullable();
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
