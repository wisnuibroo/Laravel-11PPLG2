<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Grade;  // Pastikan untuk mengimpor model Grade
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Memuat data relasi grade dan department
        $students = Student::with('grade.department')->get(); // Gunakan with() untuk eager loading yang lebih efisien

        return view('admin.student.student-admin', [
            'title' => 'Students',
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Menambahkan data grades ke view create
        return view('admin.student.create', [
            "title" => "Create New Student",
            'grades' => Grade::all(), // Pastikan data grade tersedia di form create
            'departments' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email|max:255',
            'alamat'    => 'required|string|max:255',
        ]);

        // Simpan data student ke dalam tabel students
        $students = Student::create([
            'nama'    => $validated['nama'],
            'grade_id'=> $validated['grade_id'],
            'email'   => $validated['email'],
            'alamat'  => $validated['alamat'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/student')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::findOrFail($id);
        return view('admin.student.show', [
            'student' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Ambil data grades untuk pilihan pada form
        $grades = Grade::all();

        // Tampilkan halaman edit dengan data siswa dan grades
        return view('admin.student.edit', [
            'title'   => 'Edit Student Data',
            'student' => $student,
            'grades'  => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email|max:255',
            'alamat'    => 'required|string|max:255',
        ]);

        // Cari siswa berdasarkan ID dan update data
        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect('/admin/student')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari siswa berdasarkan ID dan hapus data
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/admin/student')->with('success', 'Student deleted successfully.');
    }
}
