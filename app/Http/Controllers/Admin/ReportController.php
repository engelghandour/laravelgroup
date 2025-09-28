<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }
    public function create()
    {
        return view('admin.reports.create');
    }
    public function store(Request $request)
    { /* ... */
    }
    public function show($id)
    {
        return view('admin.reports.show');
    }
    public function edit($id)
    {
        return view('admin.reports.edit');
    }
    public function update(Request $request, $id)
    { /* ... */
    }
    public function destroy($id)
    { /* ... */
    }
}
