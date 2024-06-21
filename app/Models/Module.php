<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'course_id'];

    /* Define the relationship with the Course model
    *  Um módulo pertence a vários cursos
    */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
