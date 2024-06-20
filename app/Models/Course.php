<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /* Define the relationship with the Module model
    *  Um curso tem vários módulos
    */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
