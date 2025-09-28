<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teachers.index');
    }
    public function create()
    {
        return view('admin.teachers.create');
    }
    public function store(Request $request)
    { /* ... */
    }
    public function show($id)
    {
        return view('admin.teachers.show');
    }
    public function edit($id)
    {
        return view('admin.teachers.edit');
    }
    public function update(Request $request, $id)
    { /* ... */
    }
    public function destroy($id)
    { /* ... */
    }
}
