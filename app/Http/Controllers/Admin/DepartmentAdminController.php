<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Department;

class DepartmentAdminController
{
    public function index()
    {

        return view('admin.department.department-admin', [
            'title' => 'Departments',
            'departments' => Department::all()
        ]);
    }


    public function create()
    {
        // Menambahkan data grades ke view create
        return view('admin.department.create', [
            "title" => "Create New Department",
            'department' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'desc'    => 'required|string|max:255',
        ]);

        // Simpan data student ke dalam tabel students
        $departments = Department::create([
            'name'    => $validated['name'],
            'desc'  => $validated['desc'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/department')->with('success', 'Department created successfully.');
    }

    public function show(string $id)
    {
        $departments = Department::findOrFail($id);
        return view('admin.department.show', [
            'department' => $departments
        ]);
    }

    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $department = Department::findOrFail($id);

        return view('admin.department.edit', [
            'title'   => 'Edit Student Data',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'desc'  => 'required|string|max:255',

        ]);

        // Cari siswa berdasarkan ID dan update data
        $department = Department::findOrFail($id);
        $department->update($validated);

        return redirect('/admin/department')->with('success', 'department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari siswa berdasarkan ID dan hapus data
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/admin/department')->with('success', 'Department deleted successfully.');
    }
}
