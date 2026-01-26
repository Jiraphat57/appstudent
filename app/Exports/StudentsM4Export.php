<?php

namespace App\Exports;

use App\Models\Student4;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsM4Export implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student4::with([
                // 'classlevel','typetitle','name','surname','nameeng','surnameeng','nationalid','phone1student','religion','nationality',
                // 'ethnicity','dateofbirth','provincesbirth','bloodtypes','weight','height','disability','previousschool','provinceschool','beingonlychild',
                // 'brothers','youngerbrother','oldersister','sister','sumsiblings','houseid','housenumber','villagenumber','villagename','district','subdistrict',
                // 'provinces','postalcode','typeresidences','distancelatyangroad','traveltime','travelschool1s','typetitlesfather','name_father','surname_father',
                // 'field_citizenfather','occupationfather','income_father','phone_father','typetitlesmother','name_mother','surname_mother','field_citizenmother',
                // 'occupationmother','income_mother','phone_mother','maritalstatuses','parent',
                'classlevel','typetitle','religion','nationality',
                'ethnicity','provincebirth','bloodtype','provinceschool',
                'provincesaddress','typeresidence','travelschool1','typetitlefather','occupationfather','typetitlemother',
                'occupationmother','maritalstatus',
                // 'secondaryschool1_id','secondaryschool2_id','secondaryschool3_id',
                // 'secondaryschool4_id','secondaryschool5_id','secondaryschool6_id','secondaryschool7_id','secondaryschool8_id','servicearea1_id','districtschool1_id',
            ])->get();
    }
    public function map($student): array
    {
        return [
            // $student->id,                                  
            $student->classlevel->classlevel ?? '-',                    // ชั้น
            $student->typetitle->typetitle ?? '-',                          // คำนำหน้าชื่อ
            $student->name,                                 //  ชื่อ
            $student->surname,                              //นามสกุล
            $student->nameeng,                              // ชื่อภาษาอังกฤษ
            $student->surnameeng,                           //  นามสกุลภาษาอังกฤษ
            $student->nationalid,                           //  เลขประจำตัวประชาชน
            $student->phone1student,                            //เบอร์โทร
            $student->religion->religion ?? '-',               //ศาสนา
            $student->nationality->nationalitie ?? '-',            //สัญชาติ
            $student->ethnicity->ethnicitie ?? '-',                //เชื้อชาติ
            $student->dateofbirth,                                      //วันเกิด
            $student->pprovincebirth->province ?? '-',               //จังหวัดเกิด
            $student->bloodtype->bloodtype ?? '-',              //กรุ๊ปเลือด
            $student->weight,                       //น้ำหนัก
            $student->height,                   //ส่วนสูง
            $student->disability,               //นักเรียนพิการหรือไม่
            $student->previousschool,           //โรงเรียนเดิมที่จบมา
            $student->provinceschool->province ?? '-',               //จังหวัดโรงเรียนเดิม
            $student->beingonlychild,                   // นักเรียนเป็นบุตรคนที่
            $student->brothers,                             //จำนวนพี่ชาย
            $student->youngerbrother,                   //จำนวนน้องชาย
            $student->oldersister,                   //จำนวนพี่สาว
            $student->sister,                       //จำนวนน้องสาว
            $student->sumsiblings,                   //จำนวนพี่น้องที่เรียนอยู่
            $student->houseid,                      //เลขทะเบียนบ้าน
            $student->housenumber,                   //บ้านเลขที่
            $student->villagenumber,                   //หมู่ที่
            $student->villagename,                   //ชื่อหมู่บ้าน
            $student->district,                     //ตำบล
            $student->subdistrict,                      //อำเภอ
            $student->provincesaddress->province ?? '-',                        //จังหวัด
            $student->postalcode,                           //รหัสไปรษณีย์
            $student->typeresidence->typeresidence ?? '-',              //ลักษณะที่พักอาศัย
            $student->distancelatyangroad,                          //ที่พักห่าง รร.เป็นกี่เมตร
            $student->traveltime,                                   //ใช้เวลามา รร.กี่นาที
            $student->travelschool->nametravelschool	 ?? '-',                    //พาหนะที่ใช้มาโรงเรียน
            $student->typetitlefather->typetitle ?? '-',                //คำนำหน้าชื่อบิดา
            $student->name_father,                          //ชื่อบิดา
            $student->surname_father,                       //นามสกุล
            $student->field_citizenfather,                   //เลขประจำตัวประชาชน
            $student->occupationfather->occupation ?? '-',                //อาชีพบิดา
            $student->income_father,                          //รายได้ต่อเดือน
            $student->phone_father,                          //เบอร์โทรศัพท์
            $student->typetitlemother->typetitle ?? '-',                    //คำนำหน้าชื่อ
            $student->name_mother,                              //ชื่อมารดา
            $student->surname_mother,                          //นามสกุล
            $student->field_citizenmother,                          //เลขประจำตัวประชาชน
            $student->occupationmother->occupation ?? '-',               //อาชีพมารดา
            $student->income_mother,                          //รายได้ต่อเดือน
            $student->phone_mother,                          //เบอร์โทรศัพท์
            $student->maritalstatus->maritalstatuse ?? '-',                    //สถานภาพของบิดา-มารดา
            ];
    }

    public function headings(): array
    {
        return [
            'ชั้น','คำนำหน้า','ชื่อ','นามสกุล','ชื่อภาษาอังกฤษ','นามสกุลภาษาอังกฤษ','เลขประจำตัวประชาชน','เบอร์โทร','ศาสนา','สัญชาติ','เชื้อชาติ','วันเกิด','จังหวัดเกิด','กรุ๊ปเลือด',
            'น้ำหนัก','ส่วนสูง','นักเรียนพิการหรือไม่','รร.เดิมที่จบมา','จังหวัดเกิด','นักเรียนเป็นบุตรคนที่','จำนวนพี่ชาย','จำนวนน้องชาย','จำนวนพี่สาว','จำนวนน้องสาว','จำนวนพี่น้องที่เรียนอยู่',
            'เลขทะเบียนบ้าน','บ้านเลขที่','หมู่ที่','ชื่อหมู่บ้าน','ตำบล','อำเภอ','จังหวัดเกิด','รหัสไปรษณีย์','ลักษณะที่พักอาศัย','ที่พักห่าง รร.เป็นกี่เมตร','ใช้เวลามา รร.กี่นาที','พาหนะที่ใช้มาโรงเรียน',
            'คำนำหน้าชื่อบิดา','ชื่อบิดา','นามสกุล','เลขประจำตัวประชาชน','อาชีพบิดา','รายได้ต่อเดือน','บอร์โทรศัพท์',
            'คำนำหน้าชื่อ','ชื่อมารดา','นามสกุล','เลขประจำตัวประชาชน','อาชีพมารดา','รายได้ต่อเดือน','เบอร์โทรศัพท์','สถานภาพบิดา-มารดา'
        ];
    }
    }
