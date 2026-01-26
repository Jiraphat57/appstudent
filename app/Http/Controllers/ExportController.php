<?php

namespace App\Http\Controllers;

use App\Exports\StudentsM1Export;
use App\Exports\StudentsM4Export;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function studentsM1()
    {
        return Excel::download(
            new StudentsM1Export,
            'students_m1_2569.xlsx'
        );
    }
    public function studentsM4()
    {
        return Excel::download(
            new StudentsM4Export,
            'students_m4_2569.xlsx'
        );
    }
}
