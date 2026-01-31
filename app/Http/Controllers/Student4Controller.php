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

class Student4Controller extends Controller
{
    public function generatePDF4($id)
    {
        // ดึงข้อมูลนักเรียนจาก ID
        // $students = Students::with('classlevel')->findOrFail($id);
        // $students = Students::with('typetitle')->findOrFail($id);

        $students = Student4::with([
            'classlevel','numId','typetitle', 'religion', 'nationality', 'ethnicity', 'provincebirth', 'bloodtype', 'provinceschool', 'provincesaddress', 'typeresidence',
            'travelschool1', 'typetitlefather', 'occupationfather',
            'typetitlemother', 'occupationmother', 'maritalstatus','highschool1','highschool2','highschool3',
            'highschool4','highschool5','highschool6','highschool7','highschool8','highschool9','highschool10'
        ])->findOrFail($id);
        // $students = Students::all()->findOrFail($id);
        // $students = Students::findOrFail($id);
        // สร้าง PDF โดยใช้ View และส่งข้อมูลไปยัง View
        // $pdf = Pdf::loadView('students.pdf', compact('student'));
        $pdf = PDF::loadView('students4_pdf', compact('students'));
        // คืนค่า PDF ให้ดาวน์โหลด
        // return $pdf->stream('student_' . $students->id . '.pdf');
        return $pdf->download('student4_' . $students->nationalid . '.pdf');
    }
    public function auth4generatePDF($id)
    {
        // ดึงข้อมูลนักเรียนจาก ID
        // $students = Students::with('classlevel')->findOrFail($id);
        // $students = Students::with('typetitle')->findOrFail($id);

        $students = Student4::with([
            'classlevel', 'typetitle', 'religion', 'nationality', 'ethnicity', 'provincebirth', 'bloodtype', 'provinceschool', 'provincesaddress', 'typeresidence',
            'travelschool1', 'typetitlefather', 'occupationfather',
            'typetitlemother', 'occupationmother', 'maritalstatus','highschool1','highschool2','highschool3',
            'highschool4','highschool5','highschool6','highschool7','highschool8','highschool9','highschool10'
            ])->findOrFail($id);
        // $students = Students::all()->findOrFail($id);
        // $students = Students::findOrFail($id);
        // สร้าง PDF โดยใช้ View และส่งข้อมูลไปยัง View
        // $pdf = Pdf::loadView('students.pdf', compact('student'));
        $pdf = PDF::loadView('students4_pdf', compact('students'));
        // คืนค่า PDF ให้ดาวน์โหลด
        // return $pdf->stream('student_' . $students->id . '.pdf');
        return $pdf->download('student4_' . $students->nationalid . '.pdf');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // ถ้ามีการค้นหาจาก input 'search'
        $search = $request->input('search');

        // ดึงข้อมูลนักเรียนที่มี nationalid ตรงกับคำค้นหา
        $students = Student4::when($search, function ($query, $search) {
            return $query->where('nationalid', 'like', '%' . $search . '%');
        })->paginate(15); // หรือใช้ `get()` หากไม่ต้องการแบ่งหน้า

        return view('dashboard', compact('students', 'search'));
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
        $validatedData = $request->validate([
            'classlevels_id' => 'required|numeric',
            'numId'=> 'required|max:4',
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|string|min:13|max:13',
            'religions_id' => 'required|numeric',
            'nationalities_id' => 'required|numeric',
            'phone4student' => 'required|max:10',
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
            'highschool1_id' => 'required|numeric',
            'highschool2_id' => 'required|numeric',
            'highschool3_id' => 'required|numeric',
            'highschool4_id' => 'required|numeric',
            'highschool5_id' => 'required|numeric',
            'highschool6_id' => 'required|numeric',
            'highschool7_id' => 'required|numeric',
            'highschool8_id' => 'required|numeric',
            'highschool9_id' => 'required|numeric',
            'highschool10_id' => 'required|numeric'
            // 'highschool11_id' => 'required|numeric' 
             ], [
            'classlevels_id.required' => 'กรุณาเลือกระดับชั้น',
            'classlevels_id.numeric' => 'ระดับชั้นต้องเป็นตัวเลข',
            'numId.required' => 'กรุณากรอกเลขที่สมัคร',
            'numId.max' => 'ชื่อต้องไม่เกิน 4 หลัก',
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
            'phone4student.required' => 'กรุณากรอกเบอร์โทรศัพท์นักเรียน',
            'phone4student.max' => 'เบอร์โทรศัพท์นักเรียนต้องไม่เกิน 10 ตัวอักษร',
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
            'highschool1_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 1',
            'highschool1_id.numeric' => 'แผนการเรียนลำดับที่ 1 ต้องเป็นตัวเลข',
            'highschool2_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 2',
            'highschool2_id.numeric' => 'แผนการเรียนลำดับที่ 2 ต้องเป็นตัวเลข',
            'highschool3_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 3',
            'highschool3_id.numeric' => 'แผนการเรียนลำดับที่ 3 ต้องเป็นตัวเลข',
            'highschool4_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 4',
            'highschool4_id.numeric' => 'แผนการเรียนลำดับที่ 4 ต้องเป็นตัวเลข',
            'highschool5_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 5',
            'highschool5_id.numeric' => 'แผนการเรียนลำดับที่ 5 ต้องเป็นตัวเลข',
            'highschool6_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 6',
            'highschool6_id.numeric' => 'แผนการเรียนลำดับที่ 6 ต้องเป็นตัวเลข',
            'highschool7_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 7',
            'highschool7_id.numeric' => 'แผนการเรียนลำดับที่ 7 ต้องเป็นตัวเลข',
            'highschool8_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 8',
            'highschool8_id.numeric' => 'แผนการเรียนลำดับที่ 8 ต้องเป็นตัวเลข',
            'highschool9_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 9',
            'highschool9_id.numeric' => 'แผนการเรียนลำดับที่ 9 ต้องเป็นตัวเลข',
            'highschool10_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 10',
            'highschool10_id.numeric' => 'แผนการเรียนลำดับที่ 10 ต้องเป็นตัวเลข',
        ]);
        // dd($validatedData);
        // แปลงรูปแบบวันที่
        try {
            list($day, $month, $year) = explode('/', $validatedData['dateofbirth']);
            // แปลงปีจากพุทธศักราชเป็นคริสต์ศักราช
            $year = $year-543;
            // สร้างวันที่ด้วย Carbon
            $dateOfBirth = Carbon::createFromFormat('d/m/Y', "$day/$month/$year")->format('Y-m-d');
        } catch (\Exception $e) {
            return back()->withErrors(['dateofbirth' => 'รูปแบบวันที่ไม่ถูกต้อง']);
        }
        $students = new Student4();
        $students->classlevels_id = $request->input('classlevels_id');
        $students->numId = $request->input('numId');
        $students->typetitles_id = $request->input('typetitles_id');
        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->nameeng = $request->input('nameeng');
        $students->surnameeng = $request->input('surnameeng');
        $students->nationalid = $request->input('nationalid');
        $students->religions_id = $request->input('religions_id');
        $students->nationalities_id = $request->input('nationalities_id');
        $students->phone4student = $request->input('phone4student');
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
        $students->highschool1_id = $request->input('highschool1_id');
        $students->highschool2_id = $request->input('highschool2_id');
        $students->highschool3_id = $request->input('highschool3_id');
        $students->highschool4_id = $request->input('highschool4_id');
        $students->highschool5_id = $request->input('highschool5_id');
        $students->highschool6_id = $request->input('highschool6_id');
        $students->highschool7_id = $request->input('highschool7_id');
        $students->highschool8_id = $request->input('highschool8_id');
        $students->highschool9_id = $request->input('highschool9_id');
        $students->highschool10_id = $request->input('highschool10_id');
        // $students->highschool11_id = $request->input('highschool11_id');
        // ทำif ในนี้ ถ้าเป็นม.1  ให้เลือกไหด้3 สาย ถ้าเป็นม.4
        $students->save();
        if (Auth::check()) {
            return redirect()->route('students4.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
        } else {
            return redirect()->route('students4.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
        }
    }

    public function show(Students $students)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student4::findOrFail($id); // ดึงข้อมูลของนักเรียนที่จะแก้ไข
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
        $highschools = HighSchool::all();
        if ($students->dateofbirth) {
            // $students->dateofbirth = Carbon::parse($students->dateofbirth)->format('d-m-Y');
            $carbonDate = Carbon::parse($students->dateofbirth);
            $students->dateofbirth = $carbonDate->format('d-m') . '-' . ($carbonDate->year + 543);
            // $students->dateofbirth = $carbonDate->format('d-m-Y');

        }
        // $typetitle = Typetitle::all();
        // ส่งข้อมูลไปยัง View
        if (Auth::check()) {
            // return redirect()->route('students.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
            return view('studentsauth4_edit', compact('students', 'classlevels', 'typetitles', 'bloodtypes', 'ethnicitys', 'maritalstatus', 'nationalitys', 'occupations', 'provinces', 'religions', 'schoolbreaks', 'travelschool1s', 'typeresidences', 'travelschool1','highschools'));
        } else {
            // return redirect()->route('students1.edit', $students->id)->with('success', 'บันทึกข้อมูลสำเร็จ!');
            return view('students4_edit', compact('students', 'classlevels', 'typetitles', 'bloodtypes', 'ethnicitys', 'maritalstatus', 'nationalitys', 'occupations', 'provinces', 'religions', 'schoolbreaks', 'travelschool1s', 'typeresidences', 'travelschool1','highschools'));
        }  
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'classlevels_id' => 'required|numeric',
            'numId'=> 'required|max:4',
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|string|min:13|max:13',
            'religions_id' => 'required|numeric',
            'nationalities_id' => 'required|numeric',
            'phone4student' => 'required|max:10',
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
            'highschool1_id' => 'required|numeric',
            'highschool2_id' => 'required|numeric',
            'highschool3_id' => 'required|numeric',
            'highschool4_id' => 'required|numeric',
            'highschool5_id' => 'required|numeric',
            'highschool6_id' => 'required|numeric',
            'highschool7_id' => 'required|numeric',
            'highschool8_id' => 'required|numeric',
            'highschool9_id' => 'required|numeric',
            'highschool10_id' => 'required|numeric',
            ], [
            'classlevels_id.required' => 'กรุณาเลือกระดับชั้น',
            'classlevels_id.numeric' => 'ระดับชั้นต้องเป็นตัวเลข',
            'numId.required' => 'กรุณากรอกเลขที่สมัคร',
            'numId.max' => 'ชื่อต้องไม่เกิน 4 หลัก',
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
            'phone4student.required' => 'กรุณากรอกเบอร์โทรศัพท์นักเรียน',
            'phone4student.max' => 'เบอร์โทรศัพท์นักเรียนต้องไม่เกิน 10 ตัวอักษร',
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
            'highschool1_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 1',
            'highschool1_id.numeric' => 'แผนการเรียนลำดับที่ 1 ต้องเป็นตัวเลข',
            'highschool2_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 2',
            'highschool2_id.numeric' => 'แผนการเรียนลำดับที่ 2 ต้องเป็นตัวเลข',
            'highschool3_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 3',
            'highschool3_id.numeric' => 'แผนการเรียนลำดับที่ 3 ต้องเป็นตัวเลข',
            'highschool4_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 4',
            'highschool4_id.numeric' => 'แผนการเรียนลำดับที่ 4 ต้องเป็นตัวเลข',
            'highschool5_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 5',
            'highschool5_id.numeric' => 'แผนการเรียนลำดับที่ 5 ต้องเป็นตัวเลข',
            'highschool6_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 6',
            'highschool6_id.numeric' => 'แผนการเรียนลำดับที่ 6 ต้องเป็นตัวเลข',
            'highschool7_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 7',
            'highschool7_id.numeric' => 'แผนการเรียนลำดับที่ 7 ต้องเป็นตัวเลข',
            'highschool8_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 8',
            'highschool8_id.numeric' => 'แผนการเรียนลำดับที่ 8 ต้องเป็นตัวเลข',
            'highschool9_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 9',
            'highschool9_id.numeric' => 'แผนการเรียนลำดับที่ 9 ต้องเป็นตัวเลข',
            'highschool10_id.required' => 'กรุณาเลือกแผนการเรียนลำดับที่ 10',
            'highschool10_id.numeric' => 'แผนการเรียนลำดับที่ 10 ต้องเป็นตัวเลข',
        ]);     
    
        try {
            // ดึงข้อมูลของนักเรียนที่ต้องการอัปเดต
            $students = Student4::findOrFail($id);
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
                return redirect()->route('students4.edit');
            }

            } catch (\Exception $e) {
            // ส่งข้อความข้อผิดพลาดกลับไปยังหน้าเดิม
            return back()->withErrors(['error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
    public function updateGuest4(Request $request, $id)
        {
            $students = Student4::findOrFail($id);
            $students->update($request->all());

            return redirect()->route('welcome')
                ->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        }
    public function destroy($id)
    {
        try {
            // ค้นหานักเรียนโดย ID
            $student = Student4::findOrFail($id);

            // ลบนักเรียน
            $student->delete();

            // กลับไปหน้า dashboard พร้อมข้อความสำเร็จ
            return redirect()->route('dashboard')->with('success', 'ลบนักเรียนสำเร็จ!');
        } catch (\Exception $e) {
            // ส่งข้อความข้อผิดพลาดกลับไปหน้าเดิม
            return back()->withErrors(['error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
        }
    }
    public function indexservicearea4(Request $request)
    {
        return view('dashboard', compact('students','student4s', 'search'));
    }
    public function createservicearea4()
    {
        return view('students.create'); // แบบฟอร์มเพิ่มนักเรียน
    }
    public function storeservicearea4(Request $request)
    {

    }
    public function editservicearea4($id)
    {
        $student = Student4::findOrFail($id); // ดึงข้อมูลของนักเรียนที่จะแก้ไข
        $classlevels = Classlevel::all(); // ดึงข้อมูลระดับชั้นทั้งหมด
        $typetitles = Typetitle::all(); // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
        $provinces = Province::all();
        $highschools = HighSchool::all();
        return view('servicearea4', compact('student', 'classlevels', 'typetitles', 'provinces', 'highschools'));
    }
    public function updateservicearea4(Request $request, $id)
    {
        $request->validate([
        'servicearea4_id' => 'required|numeric|exists:serviceareas,id',
        'districtschool4_id' => 'required|numeric|exists:districtschools,id',]);
        // 2️⃣ ดึงข้อมูลนักเรียน
        // $student = Students::findOrFail($id); // ดึงข้อมูลของนักเรียนที่จะแก้ไข
        $classlevels = Classlevel::all(); // ดึงข้อมูลระดับชั้นทั้งหมด
        $typetitles = Typetitle::all(); // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
        $provinces = Province::all();
        $highschools = HighSchool::all();
        $districtschools = Districtschool::all();
        $student = Student4::findOrFail($id); 
        $student->update([
            'servicearea4_id' => $request->servicearea4_id,
            'districtschool4_id' => $request->districtschool4_id,
        ]);
        return redirect()
            ->route('dashboard', $id)
            ->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
    public function dashboard4()
    {
        $countM4 = Student4::where('classlevels_id', 2)->count();
        // Servicearea;
        $countInM4 = Student4::where('servicearea4_id', 3)->count();
        $countOutM4 = Student4::where('servicearea4_id', 4)->count();
        $countOut_M4 = Student4::where('servicearea4_id', 5)->count();
        $countdistric1 = Student4::where('districtschool4_id', 1)->count();
        $countdistric2 = Student4::where('districtschool4_id', 2)->count();
        $countdistric3 = Student4::where('districtschool4_id', 3)->count();
        $countdistric4 = Student4::where('districtschool4_id', 4)->count();
        $countdistric5 = Student4::where('districtschool4_id', 5)->count();
        $countdistric6 = Student4::where('districtschool4_id', 6)->count();
        $countdistric7 = Student4::where('districtschool4_id', 7)->count();
        $countdistric8 = Student4::where('districtschool4_id', 8)->count();
        $countdistric9 = Student4::where('districtschool4_id', 9)->count();
        $countdistric10 = Student4::where('districtschool4_id', 10)->count();
        $countdistric11 = Student4::where('districtschool4_id', 11)->count();
        $countdistric12 = Student4::where('districtschool4_id', 12)->count();
        $countdistric13 = Student4::where('districtschool4_id', 13)->count();
        $countdistric14 = Student4::where('districtschool4_id', 14)->count();
        $countdistric15 = Student4::where('districtschool4_id', 15)->count();
        $countdistric16 = Student4::where('districtschool4_id', 16)->count();
        $countdistric17 = Student4::where('districtschool4_id', 17)->count();
        $countdistric18 = Student4::where('districtschool4_id', 18)->count();
        $countdistric19 = Student4::where('districtschool4_id', 19)->count();
        return view('themes.dashboard4', compact('countM4','countInM4','countOutM4','countOut_M4','countdistric1','countdistric2','countdistric3',
        'countdistric4','countdistric5','countdistric6','countdistric7','countdistric8','countdistric9','countdistric10','countdistric11','countdistric12',
        'countdistric13','countdistric14','countdistric15','countdistric16','countdistric17','countdistric18','countdistric19'));
    }
}
