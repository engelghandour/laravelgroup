<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('admin.subjects.index');
    }
    public function create()
    {
        return view('admin.subjects.create');
    }
    public function store(Request $request)
    { /* ... */
    }
    public function show($id)
    {
        return view('admin.subjects.show');
    }
    public function edit($id)
    {
        return view('admin.subjects.edit');
    }
    public function update(Request $request, $id)
    { /* ... */
    }
    public function destroy($id)
    { /* ... */
    }
}
