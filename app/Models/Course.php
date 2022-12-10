<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'credits',
        'teacher',
        'pre_requisite',
        'a_hours',
        'd_hours'
    ];

    public function programs(){
        return $this->belongsToMany(Program::class, 'course_programs',);
    }

}
