<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('landing');
});

// Test database connection route
Route::get('/test-db', function () {
    try {
        $result = DB::connection('php_fich')->select('SELECT COUNT(*) as count FROM users');
        return response()->json(['success' => true, 'result' => $result]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
});

// Test authentication status
Route::get('/test-auth', function () {
    $isLoggedIn = Auth::check();
    $user = Auth::user();

    return response()->json([
        'logged_in' => $isLoggedIn,
        'user' => $user ? [
            'id' => $user->idusers,
            'name' => $user->name,
            'email' => $user->email
        ] : null,
        'session_id' => session()->getId(),
        'csrf_token' => csrf_token()
    ]);
});

// Quick login bypass for testing (REMOVE IN PRODUCTION)
Route::get('/quick-login', function () {
    try {
        $user = App\Models\User::first();
        if ($user) {
            Auth::login($user);
            return redirect('/admin');
        }
        return 'No users found in database';
    } catch (\Exception $e) {
        return 'Database error: ' . $e->getMessage();
    }
});

// Authentication routes
Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

// Dashboard routes (temporarily without auth middleware for testing)
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->name('dashboard');

Route::get('/admin', function () {
    return view('auth.dashboard');
})->name('admin.dashboard');

// Admin routes with authentication middleware
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Classes resource routes with additional AJAX routes
    Route::resource('classes', App\Http\Controllers\Admin\ClassController::class);
    Route::post('classes/search', [App\Http\Controllers\Admin\ClassController::class, 'search'])->name('classes.search');
    Route::get('classes/{class}/students', [App\Http\Controllers\Admin\ClassController::class, 'getStudents'])->name('classes.students');

    // Students resource routes
    Route::resource('students', App\Http\Controllers\Admin\StudentController::class);
    Route::post('students/bulk-assign', [App\Http\Controllers\Admin\StudentController::class, 'bulkAssign'])->name('students.bulk-assign');

    // Teachers resource routes with additional functionality
    Route::resource('teachers', App\Http\Controllers\Admin\TeacherController::class);
    Route::get('teachers/{teacher}/classes', [App\Http\Controllers\Admin\TeacherController::class, 'getClasses'])->name('teachers.classes');

    // Subjects resource routes
    Route::resource('subjects', App\Http\Controllers\Admin\SubjectController::class);
    Route::post('subjects/{subject}/assign-teacher', [App\Http\Controllers\Admin\SubjectController::class, 'assignTeacher'])->name('subjects.assign-teacher');

    // Attendance resource routes
    Route::resource('attendance', App\Http\Controllers\Admin\AttendanceController::class);
    Route::post('attendance/mark-bulk', [App\Http\Controllers\Admin\AttendanceController::class, 'markBulk'])->name('attendance.mark-bulk');
    Route::get('attendance/class/{class}/date/{date}', [App\Http\Controllers\Admin\AttendanceController::class, 'getByClassAndDate'])->name('attendance.by-class-date');

    // Reports resource routes
    Route::resource('reports', App\Http\Controllers\Admin\ReportController::class);
    Route::get('reports/generate/{type}', [App\Http\Controllers\Admin\ReportController::class, 'generate'])->name('reports.generate');
    Route::post('reports/export', [App\Http\Controllers\Admin\ReportController::class, 'export'])->name('reports.export');
});

// API routes for AJAX calls (if needed)
Route::prefix('api/admin')->name('api.admin.')->middleware(['auth'])->group(function () {
    Route::get('classes/filter', [App\Http\Controllers\Admin\ClassController::class, 'filter'])->name('classes.filter');
    Route::get('teachers/list', [App\Http\Controllers\Admin\TeacherController::class, 'list'])->name('teachers.list');
    Route::get('students/by-class/{class}', [App\Http\Controllers\Admin\StudentController::class, 'getByClass'])->name('students.by-class');
    Route::post('classes/store', [App\Http\Controllers\Admin\ClassController::class, 'store'])->name('classes.store');
    Route::post('classes/update', [App\Http\Controllers\Admin\ClassController::class, 'update'])->name('classes.update');
});
