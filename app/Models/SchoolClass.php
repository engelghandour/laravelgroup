<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Student;

class SchoolClass extends Model
{
    use HasFactory;

    protected $connection = 'php_fich';
    protected $table = 'classes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'grade',
        'teacher_id',
        'description',
        'students_count'
    ];

    protected $casts = [
        'grade' => 'integer',
        'teacher_id' => 'integer',
        'students_count' => 'integer'
    ];

    /**
     * Get the teacher assigned to this class.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    /**
     * Get the students in this class.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
