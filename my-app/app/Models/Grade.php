<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['nosaukums', 'ieguts', 'svars', 'subject_id'];
    /** @use HasFactory<\Database\Factories\GradeFactory> */
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    //$grade->subject->nosaukums
}
