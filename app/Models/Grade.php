<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id'];
    

    // Relasi ke Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relasi ke Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
