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
    public function index(Request $request)
    {
        // ถ้ามีการค้นหาจาก input 'search'
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
            $students->dateofbirth = $carbonDate->format('d-m') . '-' . ($carbonDate->year + 543);
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
}
