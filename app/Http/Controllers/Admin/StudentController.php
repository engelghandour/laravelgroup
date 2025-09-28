<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.students.index');
    }
    public function create()
    {
        return view('admin.students.create');
    }
    public function store(Request $request)
    { /* ... */
    }
    public function show($id)
    {
        return view('admin.students.show');
    }
    public function edit($id)
    {
        return view('admin.students.edit');
    }
    public function update(Request $request, $id)
    { /* ... */
    }
    public function destroy($id)
    { /* ... */
    }
}
