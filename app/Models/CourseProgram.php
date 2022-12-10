<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'program_id',
        'semester'
    ];

    public function courses() {
        return $this->belongsTo(Course::class);
    }

    public function programs() {
        return $this->belongsTo(Program::class);
    }
}
