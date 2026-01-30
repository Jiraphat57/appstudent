<?php

namespace App\Http\Controllers;

use App\Models\Bloodtype;
use App\Models\Classlevel;
use App\Models\Ethnicity;
use App\Models\Maritalstatus;
use App\Models\Nationality;
use App\Models\Occupation;
use App\Models\Province;
use App\Models\Religion;
use App\Models\Schoolbreak;
use App\Models\Students;
use App\Models\Travelschool1;
use App\Models\Typeresidence;
use App\Models\Typetitle;
use App\Models\Student4;
use App\Models\SecondarySchool;
use App\Models\HighSchool;
use App\Models\Servicearea;
use App\Models\Districtschool;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function generatePDF($id)
    {
        $students = Students::with([
            'classlevel', 'typetitle', 'religion', 'nationality', 'ethnicity', 'provincebirth', 'bloodtype', 'provinceschool', 'provincesaddress', 'typeresidence',
            'travelschool1', 'typetitlefather', 'occupationfather','typetitlemother', 'occupationmother', 'maritalstatus',
            'curriculumsec1','curriculumsec2','curriculumsec3','curriculumsec4','curriculumsec5','curriculumsec6','curriculumsec7'])->findOrFail($id);
        $pdf = PDF::loadView('students_pdf', compact('students'));
        // คืนค่า PDF ให้ดาวน์โหลด
        // return $pdf->stream('student_' . $students->id . '.pdf');
        return $pdf->download('student_' . $students->nationalid . '.pdf');
    }
    public function authgeneratePDF($id)
    {
        $students = Students::with([
            'classlevel', 'typetitle', 'religion', 'nationality', 'ethnicity', 'provincebirth', 'bloodtype', 'provinceschool', 'provincesaddress', 'typeresidence',
            'travelschool1', 'typetitlefather', 'occupationfather','typetitlemother', 'occupationmother', 'maritalstatus',
            'curriculumsec1','curriculumsec2','curriculumsec3','curriculumsec4','curriculumsec5','curriculumsec6','curriculumsec7'])->findOrFail($id);
        $pdf = PDF::loadView('students_pdf', compact('students'));
        // คืนค่า PDF ให้ดาวน์โหลด
        // return $pdf->stream('student_' . $students->id . '.pdf');
        return $pdf->download('student_' . $students->nationalid . '.pdf');
    }
    /**
     * Display a listing of the resource.
     */
        // ถ้ามีการค้นหาจาก input 'search'
    public function index(Request $request)
    {
        $search = $request->input('search');

        // ดึงข้อมูลนักเรียนที่มี nationalid ตรงกับคำค้นหา
        $students = Students::when($search, function ($query, $search) {
            return $query->where('nationalid', 'like', '%' . $search . '%');
        })->paginate(15); // หรือใช้ `get()` หากไม่ต้องการแบ่งหน้า
        $student4s = Student4::when($search, function ($query, $search) {
            return $query->where('nationalid', 'like', '%' . $search . '%');
        })->paginate(15);
        // รวมข้อมูลทั้งสองเข้าด้วยกัน
        // $mergedData = [
        //     'students' => $students,
        //     'student4s' => $student4s,
        //     'search' => $search,
        // ];
        return view('dashboard', compact('students','student4s', 'search'));
    }
    public function create()
    {
        return view('students.create'); // แบบฟอร์มเพิ่มนักเรียน
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'classlevels_id' => 'required|numeric',
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|string|min:13|max:13',
            'religions_id' => 'required|numeric',
            'nationalities_id' => 'required|numeric',
            'phone1student' => 'required|max:10',
            'ethnicities_id' => 'required|numeric',
            'dateofbirth' => 'required|date_format:d/m/Y', // ตรวจสอบรูปแบบเป็น d/m/Y
            'provincesbirth_id' => 'required|numeric',
            'bloodtypes_id' => 'required|numeric',
            'weight' => 'required|max:3',
            'height' => 'required|max:3',
            'disability' => 'required|max:2',
            'previousschool' => 'required|max:90',
            'provinceschool_id' => 'required|numeric',
            'beingonlychild' => 'required|max:50',
            'brothers' => 'required|max:10',
            'youngerbrother' => 'required|max:10',
            'oldersister' => 'required|max:10',
            'sister' => 'required|max:10',
            'sumsiblings' => 'required|max:10',
            'houseid' => 'required|max:11',
            'housenumber' => 'required|max:11',
            'villagenumber' => 'required|max:8',
            'villagename' => 'required|max:100',
            'district' => 'required|max:100',
            'subdistrict' => 'required|max:100',
            'provinces_id' => 'required|numeric',
            'postalcode' => 'required|max:6',
            'typeresidences_id' => 'required|numeric',
            'distancelatyangroad' => 'required|max:7',
            'traveltime' => 'required|max:7',
            'travelschool1s_id' => 'required|numeric',
            'typetitlesfather_id' => 'required|numeric',
            'name_father' => 'required|max:100',
            'surname_father' => 'required|max:100',
            'field_citizenfather' => 'required|string|min:13|max:13',
            'occupationfather_id' => 'required|numeric',
            'income_father' => 'required|max:11',
            'phone_father' => 'required|max:10',
            'typetitlesmother_id' => 'required|numeric',
            'name_mother' => 'required|max:100',
            'surname_mother' => 'required|max:100',
            'field_citizenmother' => 'required|string|min:13|max:13',
            'occupationmother_id' => 'required|numeric',
            'income_mother' => 'required|max:11',
            'phone_mother' => 'required|max:10',
            'maritalstatuses_id' => 'required|numeric',
            'parent_id' => 'required|numeric',
            'secondaryschool1_id' => 'required|numeric',
            'secondaryschool2_id' => 'required|numeric',
            'secondaryschool3_id' => 'required|numeric',
            'secondaryschool4_id' => 'required|numeric',  
            'secondaryschool5_id' => 'required|numeric',
            'secondaryschool6_id' => 'required|numeric',
            'secondaryschool7_id' => 'required|numeric'
            // 'secondaryschool8_id' => 'required|numeric'
                ], [
            'classlevels_id.required' => 'กรุณาเลือกระดับชั้น',
            'classlevels_id.numeric' => 'ระดับชั้นต้องเป็นตัวเลข',
            'typetitles_id.required' => 'กรุณาเลือกคำนำหน้าชื่อ',
            'typetitles_id.numeric' => 'คำนำหน้าชื่อต้องเป็นตัวเลข',
            'name.required' => 'กรุณากรอกชื่อ',
            'name.max' => 'ชื่อต้องไม่เกิน 90 ตัวอักษร',
            'surname.required' => 'กรุณากรอกนามสกุล',
            'surname.max' => 'นามสกุลต้องไม่เกิน 90 ตัวอักษร',
            'nameeng.required' => 'กรุณากรอกชื่อภาษาอังกฤษ',
            'nameeng.max' => 'ชื่อภาษาอังกฤษต้องไม่เกิน 90 ตัวอักษร',
            'surnameeng.required' => 'กรุณากรอกนามสกุลภาษาอังกฤษ',
            'surnameeng.max' => 'นามสกุลภาษาอังกฤษต้องไม่เกิน 90 ตัวอักษร',
            'nationalid.required' => 'กรุณากรอกเลขบัตรประชาชน',
            'nationalid.string' => 'เลขบัตรประชาชนต้องเป็นตัวอักษร',
            'nationalid.min' => 'เลขบัตรประชาชนต้องมี 13 หลัก',
            'nationalid.max' => 'เลขบัตรประชาชนต้องมี 13 หลัก',
            'religions_id.required' => 'กรุณาเลือกศาสนา',
            'religions_id.numeric' => 'ศาสนาต้องเป็นตัวเลข',
            'nationalities_id.required' => 'กรุณาเลือกสัญชาติ',
            'nationalities_id.numeric' => 'สัญชาติต้องเป็นตัวเลข',
            'phone1student.required' => 'กรุณากรอกเบอร์โทรศัพท์นักเรียน',
            'phone1student.max' => 'เบอร์โทรศัพท์นักเรียนต้องไม่เกิน 10 ตัวอักษร',
            'ethnicities_id.required' => 'กรุณาเลือกเชื้อชาติ',
            'ethnicities_id.numeric' => 'เชื้อชาติต้องเป็นตัวเลข',
            'dateofbirth.required' => 'กรุณากรอกวันเกิด',
            'dateofbirth.date_format' => 'รูปแบบวันที่ไม่ถูกต้อง (ต้องเป็น d/m/Y)',
            'provincesbirth_id.required' => 'กรุณาเลือกจังหวัดที่เกิด',
            'provincesbirth_id.numeric' => 'จังหวัดที่เกิดต้องเป็นตัวเลข',
            'bloodtypes_id.required' => 'กรุณาเลือกกรุ๊ปเลือด',
            'bloodtypes_id.numeric' => 'กรุ๊ปเลือดต้องเป็นตัวเลข',
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.max' => 'น้ำหนักต้องไม่เกิน 3 ตัวอักษร',
            'height.required' => 'กรุณากรอกส่วนสูง',
            'height.max' => 'ส่วนสูงต้องไม่เกิน 3 ตัวอักษร',
            'disability.required' => 'กรุณากรอกความพิการ',
            'disability.max' => 'ความพิการต้องไม่เกิน 2 ตัวอักษร',
            'previousschool.required' => 'กรุณากรอกโรงเรียนเดิม',
            'previousschool.max' => 'โรงเรียนเดิมต้องไม่เกิน 90 ตัวอักษร',
            'provinceschool_id.required' => 'กรุณาเลือกจังหวัดของโรงเรียน',
            'provinceschool_id.numeric' => 'จังหวัดของโรงเรียนต้องเป็นตัวเลข',
            'beingonlychild.required' => 'กรุณากรอกข้อมูลบุตรคนเดียว',
            'beingonlychild.max' => 'ข้อมูลบุตรคนเดียวต้องไม่เกิน 50 ตัวอักษร',
            'brothers.required' => 'กรุณากรอกจำนวนพี่ชาย',
            'brothers.max' => 'จำนวนพี่ชายต้องไม่เกิน 10 ตัวอักษร',
            'youngerbrother.required' => 'กรุณากรอกจำนวนน้องชาย',
            'youngerbrother.max' => 'จำนวนน้องชายต้องไม่เกิน 10 ตัวอักษร',
            'oldersister.required' => 'กรุณากรอกจำนวนพี่สาว',
            'oldersister.max' => 'จำนวนพี่สาวต้องไม่เกิน 10 ตัวอักษร',
            'sister.required' => 'กรุณากรอกจำนวนน้องสาว',
            'sister.max' => 'จำนวนน้องสาวต้องไม่เกิน 10 ตัวอักษร',
            'sumsiblings.required' => 'กรุณากรอกจำนวนพี่น้องรวม',
            'sumsiblings.max' => 'จำนวนพี่น้องรวมต้องไม่เกิน 10 ตัวอักษร',
            'houseid.required' => 'กรุณากรอกเลขที่บ้าน',
            'houseid.max' => 'เลขที่บ้านต้องไม่เกิน 11 ตัวอักษร',
            'housenumber.required' => 'กรุณากรอกเลขที่บ้าน',
            'housenumber.max' => 'เลขที่บ้านต้องไม่เกิน 11 ตัวอักษร',
            'villagenumber.required' => 'กรุณากรอกหมู่ที่',
            'villagenumber.max' => 'หมู่ที่ต้องไม่เกิน 8 ตัวอักษร',
            'villagename.required' => 'กรุณากรอกชื่อหมู่บ้าน',
            'villagename.max' => 'ชื่อหมู่บ้านต้องไม่เกิน 100 ตัวอักษร',
            'district.required' => 'กรุณากรอกตำบล',
            'district.max' => 'ตำบลต้องไม่เกิน 100 ตัวอักษร',
            'subdistrict.required' => 'กรุณากรอกอำเภอ',
            'subdistrict.max' => 'อำเภอต้องไม่เกิน 100 ตัวอักษร',
            'provinces_id.required' => 'กรุณาเลือกจังหวัด',
            'provinces_id.numeric' => 'จังหวัดต้องเป็นตัวเลข',
            'postalcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'postalcode.max' => 'รหัสไปรษณีย์ต้องไม่เกิน 6 ตัวอักษร',
            'typeresidences_id.required' => 'กรุณาเลือกประเภทที่อยู่อาศัย',
            'typeresidences_id.numeric' => 'ประเภทที่อยู่อาศัยต้องเป็นตัวเลข',
            'distancelatyangroad.required' => 'กรุณากรอกระยะทางจากถนนลาดยาง',
            'distancelatyangroad.max' => 'ระยะทางจากถนนลาดยางต้องไม่เกิน 7 ตัวอักษร',
            'traveltime.required' => 'กรุณากรอกเวลาในการเดินทาง',
            'traveltime.max' => 'เวลาในการเดินทางต้องไม่เกิน 7 ตัวอักษร',
            'travelschool1s_id.required' => 'กรุณาเลือกวิธีการเดินทางมาโรงเรียน',
            'travelschool1s_id.numeric' => 'วิธีการเดินทางมาโรงเรียนต้องเป็นตัวเลข',
            'typetitlesfather_id.required' => 'กรุณาเลือกคำนำหน้าชื่อบิดา',
            'typetitlesfather_id.numeric' => 'คำนำหน้าชื่อบิดาต้องเป็นตัวเลข',
            'name_father.required' => 'กรุณากรอกชื่อบิดา',
            'name_father.max' => 'ชื่อบิดาต้องไม่เกิน 100 ตัวอักษร',
            'surname_father.required' => 'กรุณากรอกนามสกุลบิดา',
            'surname_father.max' => 'นามสกุลบิดาต้องไม่เกิน 100 ตัวอักษร',
            'field_citizenfather.required' => 'กรุณากรอกเลขบัตรประชาชนบิดา',
            'field_citizenfather.string' => 'เลขบัตรประชาชนบิดาต้องเป็นตัวอักษร',
            'field_citizenfather.min' => 'เลขบัตรประชาชนบิดาต้องมี 13 หลัก',
            'field_citizenfather.max' => 'เลขบัตรประชาชนบิดาต้องมี 13 หลัก',
            'occupationfather_id.required' => 'กรุณาเลือกอาชีพบิดา',
            'occupationfather_id.numeric' => 'อาชีพบิดาต้องเป็นตัวเลข',
            'income_father.required' => 'กรุณากรอกรายได้บิดา',
            'income_father.max' => 'รายได้บิดาต้องไม่เกิน 11 ตัวอักษร',
            'phone_father.required' => 'กรุณากรอกเบอร์โทรศัพท์บิดา',
            'phone_father.max' => 'เบอร์โทรศัพท์บิดาต้องไม่เกิน 10 ตัวอักษร',
            'typetitlesmother_id.required' => 'กรุณาเลือกคำนำหน้าชื่อมารดา',
            'typetitlesmother_id.numeric' => 'คำนำหน้าชื่อมารดาต้องเป็นตัวเลข',
            'name_mother.required' => 'กรุณากรอกชื่อมารดา',
            'name_mother.max' => 'ชื่อมารดาต้องไม่เกิน 100 ตัวอักษร',
            'surname_mother.required' => 'กรุณากรอกนามสกุลมารดา',
            'surname_mother.max' => 'นามสกุลมารดาต้องไม่เกิน 100 ตัวอักษร',
            'field_citizenmother.required' => 'กรุณากรอกเลขบัตรประชาชนมารดา',
            'field_citizenmother.string' => 'เลขบัตรประชาชนมารดาต้องเป็นตัวอักษร',
            'field_citizenmother.min' => 'เลขบัตรประชาชนมารดาต้องมี 13 หลัก',
            'field_citizenmother.max' => 'เลขบัตรประชาชนมารดาต้องมี 13 หลัก',
            'occupationmother_id.required' => 'กรุณาเลือกอาชีพมารดา',
            'occupationmother_id.numeric' => 'อาชีพมารดาต้องเป็นตัวเลข',
            'income_mother.required' => 'กรุณากรอกรายได้มารดา',
            'income_mother.max' => 'รายได้มารดาต้องไม่เกิน 11 ตัวอักษร',
            'phone_mother.required' => 'กรุณากรอกเบอร์โทรศัพท์มารดา',
            'phone_mother.max' => 'เบอร์โทรศัพท์มารดาต้องไม่เกิน 10 ตัวอักษร',
            'maritalstatuses_id.required' => 'กรุณาเลือกสถานภาพสมรส',
            'maritalstatuses_id.numeric' => 'สถานภาพสมรสต้องเป็นตัวเลข',
            'parent_id.required' => 'กรุณาเลือกผู้ปกครอง',
            'parent_id.numeric' => 'ผู้ปกครองต้องเป็นตัวเลข',
            'secondaryschool1_id.required' => 'กรุณาเลือกสายการเรียน 1',
            'secondaryschool1_id.numeric' => 'สายการเรียน 1 ต้องเป็นตัวเลข',
            'secondaryschool2_id.required' => 'กรุณาเลือกสายการเรียน 2',
            'secondaryschool2_id.numeric' => 'สายการเรียน 2 ต้องเป็นตัวเลข',
            'secondaryschool3_id.required' => 'กรุณาเลือกสายการเรียน 3',
            'secondaryschool3_id.numeric' => 'สายการเรียน 3 ต้องเป็นตัวเลข',
            'secondaryschool4_id.required' => 'กรุณาเลือกสายการเรียน 4',
            'secondaryschool4_id.numeric' => 'สายการเรียน 4 ต้องเป็นตัวเลข',
            'secondaryschool5_id.required' => 'กรุณาเลือกสายการเรียน 5',
            'secondaryschool5_id.numeric' => 'สายการเรียน 5 ต้องเป็นตัวเลข',
            'secondaryschool6_id.required' => 'กรุณาเลือกสายการเรียน 6',
            'secondaryschool6_id.numeric' => 'สายการเรียน 6 ต้องเป็นตัวเลข',
            'secondaryschool7_id.required' => 'กรุณาเลือกสายการเรียน 7',
            'secondaryschool7_id.numeric' => 'สายการเรียน 7 ต้องเป็นตัวเลข',
        ]);
        // dd($validatedData);
        // แปลงรูปแบบวันที่
        try {
            list($day, $month, $year) = explode('/', $validatedData['dateofbirth']);
            // แปลงปีจากพุทธศักราชเป็นคริสต์ศักราช
            $year = $year;
            // สร้างวันที่ด้วย Carbon
            $dateOfBirth = Carbon::createFromFormat('d/m/Y', "$day/$month/$year")->format('Y-m-d');
        } catch (\Exception $e) {
            return back()->withErrors(['dateofbirth' => 'รูปแบบวันที่ไม่ถูกต้อง']);
        }
        $students = new Students();
        $students->classlevels_id = $request->input('classlevels_id');
        $students->typetitles_id = $request->input('typetitles_id');
        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->nameeng = $request->input('nameeng');
        $students->surnameeng = $request->input('surnameeng');
        $students->nationalid = $request->input('nationalid');
        $students->religions_id = $request->input('religions_id');
        $students->nationalities_id = $request->input('nationalities_id');
        $students->phone1student = $request->input('phone1student');
        $students->ethnicities_id = $request->input('ethnicities_id');
        $students->dateofbirth = $dateOfBirth; // ใช้วันที่ที่แปลงแล้ว
        $students->provincesbirth_id = $request->input('provincesbirth_id');
        $students->bloodtypes_id = $request->input('bloodtypes_id');
        $students->weight = $request->input('weight');
        $students->height = $request->input('height');
        $students->disability = $request->input('disability');
        $students->previousschool = $request->input('previousschool');
        $students->provinceschool_id = $request->input('provinceschool_id');
        $students->beingonlychild = $request->input('beingonlychild');
        $students->brothers = $request->input('brothers');
        $students->youngerbrother = $request->input('youngerbrother');
        $students->oldersister = $request->input('oldersister');
        $students->sister = $request->input('sister');
        $students->sumsiblings = $request->input('sumsiblings');
        $students->houseid = $request->input('houseid');
        $students->housenumber = $request->input('housenumber');
        $students->villagenumber = $request->input('villagenumber');
        $students->villagename = $request->input('villagename');
        $students->district = $request->input('district');
        $students->subdistrict = $request->input('subdistrict');
        $students->provinces_id = $request->input('provinces_id');
        $students->postalcode = $request->input('postalcode');
        $students->typeresidences_id = $request->input('typeresidences_id');
        $students->distancelatyangroad = $request->input('distancelatyangroad');
        $students->traveltime = $request->input('traveltime');
        $students->travelschool1s_id = $request->input('travelschool1s_id');
        $students->typetitlesfather_id = $request->input('typetitlesfather_id');
        $students->name_father = $request->input('name_father');
        $students->surname_father = $request->input('surname_father');
        $students->field_citizenfather = $request->input('field_citizenfather');
        $students->occupationfather_id = $request->input('occupationfather_id');
        $students->income_father = $request->input('income_father');
        $students->phone_father = $request->input('phone_father');
        $students->typetitlesmother_id = $request->input('typetitlesmother_id');
        $students->name_mother = $request->input('name_mother');
        $students->surname_mother = $request->input('surname_mother');
        $students->field_citizenmother = $request->input('field_citizenmother');
        $students->occupationmother_id = $request->input('occupationmother_id');
        $students->income_mother = $request->input('income_mother');
        $students->phone_mother = $request->input('phone_mother');
        $students->maritalstatuses_id = $request->input('maritalstatuses_id');
        $students->parent_id = $request->input('parent_id');
        $students->secondaryschool1_id = $request->input('secondaryschool1_id');
        $students->secondaryschool2_id = $request->input('secondaryschool2_id');
        $students->secondaryschool3_id = $request->input('secondaryschool3_id');
        $students->secondaryschool4_id = $request->input('secondaryschool4_id');
        $students->secondaryschool5_id = $request->input('secondaryschool5_id');
        $students->secondaryschool6_id = $request->input('secondaryschool6_id');
        $students->secondaryschool7_id = $request->input('secondaryschool7_id');
        // $students->secondaryschool8_id = $request->input('secondaryschool8_id');
        // ทำif ในนี้ ถ้าเป็นม.1  ให้เลือกไหด้3 สาย ถ้าเป็นม.4
        $students->save();
        if (Auth::check()) {
            return redirect()->route('students.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
        } else {
            return redirect()->route('students.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Students::findOrFail($id); // ดึงข้อมูลของนักเรียนที่จะแก้ไข
        $classlevels = Classlevel::all(); // ดึงข้อมูลระดับชั้นทั้งหมด
        $typetitles = Typetitle::all(); // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
        $bloodtypes = Bloodtype::all();
        $ethnicitys = Ethnicity::all();
        $maritalstatus = Maritalstatus::all();
        $nationalitys = Nationality::all();
        $occupations = Occupation::all();
        $provinces = Province::all();
        $religions = Religion::all();
        $schoolbreaks = Schoolbreak::all();
        $travelschool1s = Travelschool1::all();
        $typeresidences = Typeresidence::all();
        $travelschool1 = Travelschool1::all();
        $secondaryschools = SecondarySchool::all();
        if ($students->dateofbirth) {
            // $students->dateofbirth = Carbon::parse($students->dateofbirth)->format('d-m-Y');
            $carbonDate = Carbon::parse($students->dateofbirth);
            $students->dateofbirth = $carbonDate->format('d-m') . '-' . ($carbonDate->year);
            // $students->dateofbirth = $carbonDate->format('d-m-Y');
        }
        // $typetitle = Typetitle::all();
        // ส่งข้อมูลไปยัง View
        if (Auth::check()) {
            // return redirect()->route('students.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
            return view('studentsauth1_edit', compact('students', 'classlevels', 'typetitles', 'bloodtypes', 'ethnicitys', 'maritalstatus', 'nationalitys', 'occupations', 'provinces', 'religions', 'schoolbreaks', 'travelschool1s', 'typeresidences', 'travelschool1','secondaryschools'));
        } else {
            // return redirect()->route('students1.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
            return view('students1_edit', compact('students', 'classlevels', 'typetitles', 'bloodtypes', 'ethnicitys', 'maritalstatus', 'nationalitys', 'occupations', 'provinces', 'religions', 'schoolbreaks', 'travelschool1s', 'typeresidences', 'travelschool1','secondaryschools'));
        }
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'classlevels_id' => 'required|numeric',
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|string|min:13|max:13',
            'religions_id' => 'required|numeric',
            'nationalities_id' => 'required|numeric',
            'phone1student' => 'required|max:10',
            'ethnicities_id' => 'required|numeric',
            // 'dateofbirth' => 'required|date_format:d/m/Y', // ตรวจสอบรูปแบบเป็น d/m/Y
            'provincesbirth_id' => 'required|numeric',
            'bloodtypes_id' => 'required|numeric',
            'weight' => 'required|max:3',
            'height' => 'required|max:3',
            'disability' => 'required|max:2',
            'previousschool' => 'required|max:90',
            'provinceschool_id' => 'required|numeric',
            'beingonlychild' => 'required|max:50',
            'brothers' => 'required|max:10',
            'youngerbrother' => 'required|max:10',
            'oldersister' => 'required|max:10',
            'sister' => 'required|max:10',
            'sumsiblings' => 'required|max:10',
            'houseid' => 'required|max:11',
            'housenumber' => 'required|max:11',
            'villagenumber' => 'required|max:8',
            'villagename' => 'required|max:100',
            'district' => 'required|max:100',
            'subdistrict' => 'required|max:100',
            'provinces_id' => 'required|numeric',
            'postalcode' => 'required|max:6',
            'typeresidences_id' => 'required|numeric',
            'distancelatyangroad' => 'required|max:7',
            'traveltime' => 'required|max:7',
            'travelschool1s_id' => 'required|numeric',
            'typetitlesfather_id' => 'required|numeric',
            'name_father' => 'required|max:100',
            'surname_father' => 'required|max:100',
            'field_citizenfather' => 'required|string|min:13|max:13',
            'occupationfather_id' => 'required|numeric',
            'income_father' => 'required|max:11',
            'phone_father' => 'required|max:10',
            'typetitlesmother_id' => 'required|numeric',
            'name_mother' => 'required|max:100',
            'surname_mother' => 'required|max:100',
            'field_citizenmother' => 'required|string|min:13|max:13',
            'occupationmother_id' => 'required|numeric',
            'income_mother' => 'required|max:11',
            'phone_mother' => 'required|max:10',
            'maritalstatuses_id' => 'required|numeric',
            'parent_id' => 'required|numeric',
            'secondaryschool1_id' => 'required|numeric',
            'secondaryschool2_id' => 'required|numeric',
            'secondaryschool3_id' => 'required|numeric', 
            'secondaryschool4_id' => 'required|numeric',  
            'secondaryschool5_id' => 'required|numeric',
            'secondaryschool6_id' => 'required|numeric',
            'secondaryschool7_id' => 'required|numeric'
            // 'secondaryschool8_id' => 'required|numeric'
                ], [
            'classlevels_id.required' => 'กรุณาเลือกระดับชั้น',
            'classlevels_id.numeric' => 'ระดับชั้นต้องเป็นตัวเลข',
            'typetitles_id.required' => 'กรุณาเลือกคำนำหน้าชื่อ',
            'typetitles_id.numeric' => 'คำนำหน้าชื่อต้องเป็นตัวเลข',
            'name.required' => 'กรุณากรอกชื่อ',
            'name.max' => 'ชื่อต้องไม่เกิน 90 ตัวอักษร',
            'surname.required' => 'กรุณากรอกนามสกุล',
            'surname.max' => 'นามสกุลต้องไม่เกิน 90 ตัวอักษร',
            'nameeng.required' => 'กรุณากรอกชื่อภาษาอังกฤษ',
            'nameeng.max' => 'ชื่อภาษาอังกฤษต้องไม่เกิน 90 ตัวอักษร',
            'surnameeng.required' => 'กรุณากรอกนามสกุลภาษาอังกฤษ',
            'surnameeng.max' => 'นามสกุลภาษาอังกฤษต้องไม่เกิน 90 ตัวอักษร',
            'nationalid.required' => 'กรุณากรอกเลขบัตรประชาชน',
            'nationalid.string' => 'เลขบัตรประชาชนต้องเป็นตัวอักษร',
            'nationalid.min' => 'เลขบัตรประชาชนต้องมี 13 หลัก',
            'nationalid.max' => 'เลขบัตรประชาชนต้องมี 13 หลัก',
            'religions_id.required' => 'กรุณาเลือกศาสนา',
            'religions_id.numeric' => 'ศาสนาต้องเป็นตัวเลข',
            'nationalities_id.required' => 'กรุณาเลือกสัญชาติ',
            'nationalities_id.numeric' => 'สัญชาติต้องเป็นตัวเลข',
            'phone1student.required' => 'กรุณากรอกเบอร์โทรศัพท์นักเรียน',
            'phone1student.max' => 'เบอร์โทรศัพท์นักเรียนต้องไม่เกิน 10 ตัวอักษร',
            'ethnicities_id.required' => 'กรุณาเลือกเชื้อชาติ',
            'ethnicities_id.numeric' => 'เชื้อชาติต้องเป็นตัวเลข',
            'dateofbirth.required' => 'กรุณากรอกวันเกิด',
            'dateofbirth.date_format' => 'รูปแบบวันที่ไม่ถูกต้อง (ต้องเป็น d/m/Y)',
            'provincesbirth_id.required' => 'กรุณาเลือกจังหวัดที่เกิด',
            'provincesbirth_id.numeric' => 'จังหวัดที่เกิดต้องเป็นตัวเลข',
            'bloodtypes_id.required' => 'กรุณาเลือกกรุ๊ปเลือด',
            'bloodtypes_id.numeric' => 'กรุ๊ปเลือดต้องเป็นตัวเลข',
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.max' => 'น้ำหนักต้องไม่เกิน 3 ตัวอักษร',
            'height.required' => 'กรุณากรอกส่วนสูง',
            'height.max' => 'ส่วนสูงต้องไม่เกิน 3 ตัวอักษร',
            'disability.required' => 'กรุณากรอกความพิการ',
            'disability.max' => 'ความพิการต้องไม่เกิน 2 ตัวอักษร',
            'previousschool.required' => 'กรุณากรอกโรงเรียนเดิม',
            'previousschool.max' => 'โรงเรียนเดิมต้องไม่เกิน 90 ตัวอักษร',
            'provinceschool_id.required' => 'กรุณาเลือกจังหวัดของโรงเรียน',
            'provinceschool_id.numeric' => 'จังหวัดของโรงเรียนต้องเป็นตัวเลข',
            'beingonlychild.required' => 'กรุณากรอกข้อมูลบุตรคนเดียว',
            'beingonlychild.max' => 'ข้อมูลบุตรคนเดียวต้องไม่เกิน 50 ตัวอักษร',
            'brothers.required' => 'กรุณากรอกจำนวนพี่ชาย',
            'brothers.max' => 'จำนวนพี่ชายต้องไม่เกิน 10 ตัวอักษร',
            'youngerbrother.required' => 'กรุณากรอกจำนวนน้องชาย',
            'youngerbrother.max' => 'จำนวนน้องชายต้องไม่เกิน 10 ตัวอักษร',
            'oldersister.required' => 'กรุณากรอกจำนวนพี่สาว',
            'oldersister.max' => 'จำนวนพี่สาวต้องไม่เกิน 10 ตัวอักษร',
            'sister.required' => 'กรุณากรอกจำนวนน้องสาว',
            'sister.max' => 'จำนวนน้องสาวต้องไม่เกิน 10 ตัวอักษร',
            'sumsiblings.required' => 'กรุณากรอกจำนวนพี่น้องรวม',
            'sumsiblings.max' => 'จำนวนพี่น้องรวมต้องไม่เกิน 10 ตัวอักษร',
            'houseid.required' => 'กรุณากรอกเลขที่บ้าน',
            'houseid.max' => 'เลขที่บ้านต้องไม่เกิน 11 ตัวอักษร',
            'housenumber.required' => 'กรุณากรอกเลขที่บ้าน',
            'housenumber.max' => 'เลขที่บ้านต้องไม่เกิน 11 ตัวอักษร',
            'villagenumber.required' => 'กรุณากรอกหมู่ที่',
            'villagenumber.max' => 'หมู่ที่ต้องไม่เกิน 8 ตัวอักษร',
            'villagename.required' => 'กรุณากรอกชื่อหมู่บ้าน',
            'villagename.max' => 'ชื่อหมู่บ้านต้องไม่เกิน 100 ตัวอักษร',
            'district.required' => 'กรุณากรอกตำบล',
            'district.max' => 'ตำบลต้องไม่เกิน 100 ตัวอักษร',
            'subdistrict.required' => 'กรุณากรอกอำเภอ',
            'subdistrict.max' => 'อำเภอต้องไม่เกิน 100 ตัวอักษร',
            'provinces_id.required' => 'กรุณาเลือกจังหวัด',
            'provinces_id.numeric' => 'จังหวัดต้องเป็นตัวเลข',
            'postalcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'postalcode.max' => 'รหัสไปรษณีย์ต้องไม่เกิน 6 ตัวอักษร',
            'typeresidences_id.required' => 'กรุณาเลือกประเภทที่อยู่อาศัย',
            'typeresidences_id.numeric' => 'ประเภทที่อยู่อาศัยต้องเป็นตัวเลข',
            'distancelatyangroad.required' => 'กรุณากรอกระยะทางจากถนนลาดยาง',
            'distancelatyangroad.max' => 'ระยะทางจากถนนลาดยางต้องไม่เกิน 7 ตัวอักษร',
            'traveltime.required' => 'กรุณากรอกเวลาในการเดินทาง',
            'traveltime.max' => 'เวลาในการเดินทางต้องไม่เกิน 7 ตัวอักษร',
            'travelschool1s_id.required' => 'กรุณาเลือกวิธีการเดินทางมาโรงเรียน',
            'travelschool1s_id.numeric' => 'วิธีการเดินทางมาโรงเรียนต้องเป็นตัวเลข',
            'typetitlesfather_id.required' => 'กรุณาเลือกคำนำหน้าชื่อบิดา',
            'typetitlesfather_id.numeric' => 'คำนำหน้าชื่อบิดาต้องเป็นตัวเลข',
            'name_father.required' => 'กรุณากรอกชื่อบิดา',
            'name_father.max' => 'ชื่อบิดาต้องไม่เกิน 100 ตัวอักษร',
            'surname_father.required' => 'กรุณากรอกนามสกุลบิดา',
            'surname_father.max' => 'นามสกุลบิดาต้องไม่เกิน 100 ตัวอักษร',
            'field_citizenfather.required' => 'กรุณากรอกเลขบัตรประชาชนบิดา',
            'field_citizenfather.string' => 'เลขบัตรประชาชนบิดาต้องเป็นตัวอักษร',
            'field_citizenfather.min' => 'เลขบัตรประชาชนบิดาต้องมี 13 หลัก',
            'field_citizenfather.max' => 'เลขบัตรประชาชนบิดาต้องมี 13 หลัก',
            'occupationfather_id.required' => 'กรุณาเลือกอาชีพบิดา',
            'occupationfather_id.numeric' => 'อาชีพบิดาต้องเป็นตัวเลข',
            'income_father.required' => 'กรุณากรอกรายได้บิดา',
            'income_father.max' => 'รายได้บิดาต้องไม่เกิน 11 ตัวอักษร',
            'phone_father.required' => 'กรุณากรอกเบอร์โทรศัพท์บิดา',
            'phone_father.max' => 'เบอร์โทรศัพท์บิดาต้องไม่เกิน 10 ตัวอักษร',
            'typetitlesmother_id.required' => 'กรุณาเลือกคำนำหน้าชื่อมารดา',
            'typetitlesmother_id.numeric' => 'คำนำหน้าชื่อมารดาต้องเป็นตัวเลข',
            'name_mother.required' => 'กรุณากรอกชื่อมารดา',
            'name_mother.max' => 'ชื่อมารดาต้องไม่เกิน 100 ตัวอักษร',
            'surname_mother.required' => 'กรุณากรอกนามสกุลมารดา',
            'surname_mother.max' => 'นามสกุลมารดาต้องไม่เกิน 100 ตัวอักษร',
            'field_citizenmother.required' => 'กรุณากรอกเลขบัตรประชาชนมารดา',
            'field_citizenmother.string' => 'เลขบัตรประชาชนมารดาต้องเป็นตัวอักษร',
            'field_citizenmother.min' => 'เลขบัตรประชาชนมารดาต้องมี 13 หลัก',
            'field_citizenmother.max' => 'เลขบัตรประชาชนมารดาต้องมี 13 หลัก',
            'occupationmother_id.required' => 'กรุณาเลือกอาชีพมารดา',
            'occupationmother_id.numeric' => 'อาชีพมารดาต้องเป็นตัวเลข',
            'income_mother.required' => 'กรุณากรอกรายได้มารดา',
            'income_mother.max' => 'รายได้มารดาต้องไม่เกิน 11 ตัวอักษร',
            'phone_mother.required' => 'กรุณากรอกเบอร์โทรศัพท์มารดา',
            'phone_mother.max' => 'เบอร์โทรศัพท์มารดาต้องไม่เกิน 10 ตัวอักษร',
            'maritalstatuses_id.required' => 'กรุณาเลือกสถานภาพสมรส',
            'maritalstatuses_id.numeric' => 'สถานภาพสมรสต้องเป็นตัวเลข',
            'parent_id.required' => 'กรุณาเลือกผู้ปกครอง',
            'parent_id.numeric' => 'ผู้ปกครองต้องเป็นตัวเลข',
            'secondaryschool1_id.required' => 'กรุณาเลือกสายการเรียน 1',
            'secondaryschool1_id.numeric' => 'สายการเรียน 1 ต้องเป็นตัวเลข',
            'secondaryschool2_id.required' => 'กรุณาเลือกสายการเรียน 2',
            'secondaryschool2_id.numeric' => 'สายการเรียน 2 ต้องเป็นตัวเลข',
            'secondaryschool3_id.required' => 'กรุณาเลือกสายการเรียน 3',
            'secondaryschool3_id.numeric' => 'สายการเรียน 3 ต้องเป็นตัวเลข',
            'secondaryschool4_id.required' => 'กรุณาเลือกสายการเรียน 4',
            'secondaryschool4_id.numeric' => 'สายการเรียน 4 ต้องเป็นตัวเลข',
            'secondaryschool5_id.required' => 'กรุณาเลือกสายการเรียน 5',
            'secondaryschool5_id.numeric' => 'สายการเรียน 5 ต้องเป็นตัวเลข',
            'secondaryschool6_id.required' => 'กรุณาเลือกสายการเรียน 6',
            'secondaryschool6_id.numeric' => 'สายการเรียน 6 ต้องเป็นตัวเลข',
            'secondaryschool7_id.required' => 'กรุณาเลือกสายการเรียน 7',
            'secondaryschool7_id.numeric' => 'สายการเรียน 7 ต้องเป็นตัวเลข',
        ]);
        // dd($validatedData);
        try {
            // ดึงข้อมูลของนักเรียนที่ต้องการอัปเดต
            $students = Students::findOrFail($id);
            // ดึงข้อมูลจาก $request (ไม่ผ่าน validation)
            $input = $request->all();
            // dd($request->all());
            // อัปเดตข้อมูลใน model (อย่าลืมกำหนด fillable ใน model)
            if ($request->has('dateofbirth')) {
                $input['dateofbirth'] = Carbon::createFromFormat('d-m-Y', $request->dateofbirth)->format('Y-m-d');
            }
            // dd($input);
            // อัปเดตข้อมูลใน model (อย่าลืมกำหนด fillable ใน model)
            $students->update($input);
            // ส่งกลับไปยังหน้า dashboard พร้อมข้อความสำเร็จ
            
            if (Auth::check()) {
                return redirect()->route('dashboard')->with('success', 'แก้ไขข้อมูลสำเร็จ!');
            }else {
                return redirect()->route('students1.edit');
            }

            } catch (\Exception $e) {
            // ส่งข้อความข้อผิดพลาดกลับไปยังหน้าเดิม
            return back()->withErrors(['error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
    public function updateGuest1(Request $request, $id)
        {
            $students = Students::findOrFail($id);
            $students->update($request->all());

            return redirect()->route('welcome')
                ->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        }

    public function destroy($id)
    {
        try {
            // ค้นหานักเรียนโดย ID
            $student = Students::findOrFail($id);

            // ลบนักเรียน
            $student->delete();

            // กลับไปหน้า dashboard พร้อมข้อความสำเร็จ
            return redirect()->route('dashboard')->with('success', 'ลบนักเรียนสำเร็จ!');
        } catch (\Exception $e) {
            // ส่งข้อความข้อผิดพลาดกลับไปหน้าเดิม
            return back()->withErrors(['error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
    public function indexservicearea1(Request $request)
    {
        return view('dashboard', compact('students','student4s', 'search'));
    }
    public function createservicearea1()
    {
        return view('students.create'); // แบบฟอร์มเพิ่มนักเรียน
    }
    public function storeservicearea1(Request $request)
    {

    }
    public function editservicearea1($id)
    {
        $student = Students::findOrFail($id);
        $classlevels = Classlevel::all(); // ดึงข้อมูลระดับชั้นทั้งหมด
        $typetitles = Typetitle::all(); // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
        $provinces = Province::all();
        $secondaryschools = SecondarySchool::all();
        return view('servicearea1', compact('student', 'classlevels', 'typetitles', 'provinces', 'secondaryschools'));
    }
    public function updateservicearea1(Request $request, $id)
    {
        // 1️⃣ Validate เฉพาะ field ที่ต้องการอัปเดต
        $request->validate([
        'servicearea1_id' => 'required|numeric|exists:serviceareas,id', 
        'districtschool1_id' => 'required|numeric|exists:districtschools,id',]);
        // 2️⃣ ดึงข้อมูลนักเรียน
        $classlevels = Classlevel::all(); // ดึงข้อมูลระดับชั้นทั้งหมด
        $typetitles = Typetitle::all(); // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
        $provinces = Province::all();
        $secondaryschools = SecondarySchool::all();
        $districtschools = Districtschool::all();
        $student = Students::findOrFail($id);
        $student->update([
            'servicearea1_id' => $request->servicearea1_id,
            'districtschool1_id' => $request->districtschool1_id,
        ]);
        return redirect()
            ->route('dashboard', $id)
            ->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    // dashboard1
    public function dashboard1()
    {
        $countM1 = Students::where('classlevels_id', 1)->count();
        // Servicearea;
        $countInM1 = Students::where('servicearea1_id', 1)->count();
        $countOutM1 = Students::where('servicearea1_id', 2)->count();
        $countdistric1 = Students::where('districtschool1_id', 1)->count();
        $countdistric2 = Students::where('districtschool1_id', 2)->count();
        $countdistric3 = Students::where('districtschool1_id', 3)->count();
        $countdistric4 = Students::where('districtschool1_id', 4)->count();
        $countdistric5 = Students::where('districtschool1_id', 5)->count();
        $countdistric6 = Students::where('districtschool1_id', 6)->count();
        $countdistric7 = Students::where('districtschool1_id', 7)->count();
        $countdistric8 = Students::where('districtschool1_id', 8)->count();
        $countdistric9 = Students::where('districtschool1_id', 9)->count();
        $countdistric10 = Students::where('districtschool1_id', 10)->count();
        $countdistric11 = Students::where('districtschool1_id', 11)->count();
        $countdistric12 = Students::where('districtschool1_id', 12)->count();
        $countdistric13 = Students::where('districtschool1_id', 13)->count();
        $countdistric14 = Students::where('districtschool1_id', 14)->count();
        $countdistric15 = Students::where('districtschool1_id', 15)->count();
        $countdistric16 = Students::where('districtschool1_id', 16)->count();
        $countdistric17 = Students::where('districtschool1_id', 17)->count();
        $countdistric18 = Students::where('districtschool1_id', 18)->count();
        $countdistric19 = Students::where('districtschool1_id', 19)->count();
        return view('themes.dashboard1', compact('countM1','countInM1','countOutM1','countdistric1','countdistric2','countdistric3','countdistric4','countdistric5'
        ,'countdistric6','countdistric7','countdistric8','countdistric9','countdistric10','countdistric11','countdistric12','countdistric13','countdistric14'
        ,'countdistric15','countdistric16','countdistric17','countdistric18','countdistric19'));
    }
}
