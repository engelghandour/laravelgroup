<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('admin.attendance.index');
    }
    public function create()
    {
        return view('admin.attendance.create');
    }
    public function store(Request $request)
    { /* ... */
    }
    public function show($id)
    {
        return view('admin.attendance.show');
    }
    public function edit($id)
    {
        return view('admin.attendance.edit');
    }
    public function update(Request $request, $id)
    { /* ... */
    }
    public function destroy($id)
    { /* ... */
    }
}
