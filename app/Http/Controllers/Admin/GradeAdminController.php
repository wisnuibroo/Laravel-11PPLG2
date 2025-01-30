<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Routing\Controller;

class GradeAdminController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['students', 'department'])->get();
        return view('admin.grade.grade-admin', [
            'title' => 'Grade',
            'grades' => $grades,
        ]);
    }

    public function create()
    {
        // Ambil data departments dari model Department
        $departments = Department::all();

        // Kirim data departments ke view
        return view('admin.grade.create', [
            "title" => "Create New Grade",
            'departments' => $departments // Kirim data departments ke form
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id', // Pastikan tabel departments ada
        ]);

        // Simpan data grade ke dalam tabel grades
        Grade::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/grade')->with('success', 'Grade created successfully.');
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grades = Grade::findOrFail($id);
        return view('admin.grade.show', [
            'grade' => $grades
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Ambil data department untuk pilihan pada form
        $departments = Department::all();

        // Tampilkan halaman edit dengan data siswa dan depart
        return view('admin.grade.edit', [
            'title'   => 'Edit Student Data',
            'grade' => $grade,
            'departments'  => $departments
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
            'department_id'  => 'required|exists:department,id',
        ]);

        // Cari siswa berdasarkan ID dan update data
        $grade = Grade::findOrFail($id);
        $grade->update($validated);

        return redirect('/admin/grade')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari siswa berdasarkan ID dan hapus data
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect('/admin/grade')->with('success', 'grade deleted successfully.');
    }
}
