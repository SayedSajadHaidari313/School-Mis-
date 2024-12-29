<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $fillable = ['name', 'class_id', 'section_id', 'email'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
