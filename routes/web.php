<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Student4Controller;
use App\Models\Students;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/takeclass1', function () {
    return view('takeclass1');
});
Route::get('/takeclass4', function () {
    return view('takeclass4');
});
Route::get('/servicearea1', function () {
    return view('servicearea1');
});
Route::resource('students', StudentsController::class);
Route::post('/students', [StudentsController::class, 'store'])->name('store1');
Route::post('/student4', [Student4Controller::class, 'store'])->name('store4');
Route::get('/students/{id}/pdf', [StudentsController::class, 'generatePDF'])->name('students.pdf');
Route::get('/students4/{id}/pdf', [Student4Controller::class, 'generatePDF4'])->name('students4.pdf');
Route::get('/download-pdf', function (Request $request) {
    $filePath = $request->query('path'); // รับ path ไฟล์จาก query string
    return response()->download($filePath)->deleteFileAfterSend(true);
})->name('download.pdf');
Route::get('/students/{students}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::get('/students4_edit/{students}/edit', [Student4Controller::class, 'edit'])->name('students4.edit');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('students.destroy');
Route::delete('/students4/{id}', [Student4Controller::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('students4.destroy');
Route::get('/authstudents/{id}/pdf', [StudentsController::class, 'authgeneratePDF'])
    ->middleware(['auth', 'verified'])
    ->name('studentsauth.pdf');
Route::get('/auth4students/{id}/pdf', [Student4Controller::class, 'auth4generatePDF'])
    ->middleware(['auth', 'verified'])
    ->name('students4auth.pdf');
Route::get('/studentsauth/{students}/edit', [StudentsController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('studentsauth.edit');
Route::get('/students4auth_edit/{students}/edit', [Student4Controller::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('students4auth.edit');
Route::patch('/students/{id}', [StudentsController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('studentsauth.update');
Route::patch('/students4/{id}', [Student4Controller::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('students4auth.update');
Route::get('/dashboard', [StudentsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::resource('students1', StudentsController::class)
    ->only(['update']);   
Route::resource('students4', Student4Controller::class)
    ->only(['edit', 'update']);
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::get('/dashboardLTE', function () {
//     return view('/themes/index');
//     })->name('/dashboardLTE');
// Route::get('/dashboardLTE', function () {
//     return view('themes.index');
// })->middleware('auth')->name('dashboardLTE1');
// Route::get('/dashboardLTE', function () {
//     return view('themes.dashboard1');
// })->middleware('auth')->name('dashboardLTE');
Route::get('/dashboardLTE', [StudentsController::class, 'dashboard1'])
    ->middleware('auth')
    ->name('dashboardLTE'); 
Route::get('/dashboardLTE4', [Student4Controller::class, 'dashboard4'])
    ->middleware('auth')
    ->name('dashboardLTE4'); 
Route::get('/export/studentsM1', [ExportController::class, 'studentsM1'])
    ->middleware('auth')
    ->name('exportM1.students');
Route::get('/export/studentsM4', [ExportController::class, 'studentsM4'])
    ->middleware('auth')
    ->name('exportM4.students');
// ระบุเฉพาะเมธอดที่ต้องการ (index, edit, update)
Route::get('/servicearea1/{id}', [StudentsController::class, 'editservicearea1'])
    ->middleware(['auth', 'verified'])
    ->name('servicearea1.edit');
// บันทึกเฉพาะ serviceareas1_id
Route::patch('/servicearea1/{id}', [StudentsController::class, 'updateservicearea1'])
    ->middleware(['auth', 'verified'])
    ->name('servicearea1.update');

Route::get('/servicearea4/{id}', [Student4Controller::class, 'editservicearea4'])
    ->middleware(['auth', 'verified'])
    ->name('servicearea4.edit');
// บันทึกเฉพาะ serviceareas1_id
Route::patch('/servicearea4/{id}', [Student4Controller::class, 'updateservicearea4'])
    ->middleware(['auth', 'verified'])
    ->name('servicearea4.update');
});
require __DIR__.'/auth.php';