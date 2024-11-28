<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Department;

class DepartmentAdminController
{
    public function index()
    {
        
        return view('department-admin', [
            'title' => 'Departments',
            'departments' => Department::all()
        ]);
    }

}
