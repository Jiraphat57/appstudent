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

class Student4Controller extends Controller
{
    public function generatePDF4($id)
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
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|max:13',
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
            'field_citizenfather' => 'required|max:13',
            'occupationfather_id' => 'required|numeric',
            'income_father' => 'required|max:11',
            'phone_father' => 'required|max:10',
            'typetitlesmother_id' => 'required|numeric',
            'name_mother' => 'required|max:100',
            'surname_mother' => 'required|max:100',
            'field_citizenmother' => 'required|max:13',
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
        ]);
        dd($validatedData);
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
        // dd($request->all());
        $validatedData = $request->validate([
            'classlevels_id' => 'required|numeric',
            'typetitles_id' => 'required|numeric',
            'name' => 'required|max:90',
            'surname' => 'required|max:90',
            'nameeng' => 'required|max:90',
            'surnameeng' => 'required|max:90',
            'nationalid' => 'required|max:13',
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
            'field_citizenfather' => 'required|max:13',
            'occupationfather_id' => 'required|numeric',
            'income_father' => 'required|max:11',
            'phone_father' => 'required|max:10',
            'typetitlesmother_id' => 'required|numeric',
            'name_mother' => 'required|max:100',
            'surname_mother' => 'required|max:100',
            'field_citizenmother' => 'required|max:13',
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
            // 'highschool11_id' => 'required|numeric' 
        ]);
        // dd($validatedData);
        try {
            // ดึงข้อมูลของนักเรียนที่ต้องการอัปเดต
            $students = Student4::findOrFail($id);
            // ดึงข้อมูลจาก $request (ไม่ผ่าน validation)
            $input = $request->all();
            // อัปเดตข้อมูลใน model (อย่าลืมกำหนด fillable ใน model)
            if ($request->has('dateofbirth')) {
                $input['dateofbirth'] = Carbon::createFromFormat('d-m-Y', $request->dateofbirth)->format('Y-m-d');
            }
            // อัปเดตข้อมูลใน model (อย่าลืมกำหนด fillable ใน model)
            // dd($input);
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
}
