<?php

namespace App\Http\Controllers;

use App\Models\Students;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PDFController extends Controller
{
    public function generatePDF()
    {
        // ดึงข้อมูลนักเรียนทั้งหมดจากฐานข้อมูล
        $students = Students::all();
        // dd($students);
        // ส่งข้อมูลไปยัง view และสร้าง PDF
        $pdf = PDF::loadView('students_pdf', compact('students'));

        // ดาวน์โหลดไฟล์ PDF
        return $pdf->download('students_list.pdf');
        //  return view('students_pdf', compact('students'));
    }
}
