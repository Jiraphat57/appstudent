<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Student4Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/takeclass1', function () {
    return view('takeclass1');
});
Route::get('/takeclass4', function () {
    return view('takeclass4');
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
Route::delete('/students/{id}', [Student4Controller::class, 'destroy'])
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

// Route::delete('/students/{id}/update', [StudentsController::class, 'update'])
//     ->middleware(['auth', 'verified'])
//     ->name('studentsauth.update');
// Route::delete('/students/{id}/update', [Student4Controller::class, 'update'])
//     ->middleware(['auth', 'verified'])
//     ->name('students4auth.update');
Route::patch('/students/{id}', [StudentsController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('studentsauth.update');

Route::patch('/students4/{id}', [Student4Controller::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('students4auth.update');
   
Route::get('/dashboard', [StudentsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// ระบุเฉพาะเมธอดที่ต้องการ (index, edit, update)
Route::resource('students1', StudentsController::class)
    ->only(['update']);   
Route::resource('students4', Student4Controller::class)
    ->only(['edit', 'update']);

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
require __DIR__.'/auth.php';
