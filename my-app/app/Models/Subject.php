<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Subject extends Model
{
    use SoftDeletes;  
    protected $fillable = ['nosaukums', 'group_id']; // ļauj izpildīt mass assignment šiem laukiem

    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    protected function weightedAvg(): Attribute
    {
        return Attribute::make(
            get: function () {
                $weightedSum = $this->grades->sum(fn($grade) => $grade->ieguts * $grade->svars);

                return round($weightedSum, 2); // noapaļots līdz 2 cipariem aiz komata
            }
        );
    }

    protected function progress(): Attribute
    {
        return Attribute::make(
            get: function () {
                $totalTests = $this->grades->count();
                $totalGrades = $this->grades->filter(fn($grade) => !is_null($grade->ieguts))->count();

                if($totalGrades < 1 || $totalTests < 1){
                    return 0;
                }

                $progress = ($totalGrades/$totalTests) * 100;

                return round($progress, 0); // noapaļots līdz veselam skaitlim
            }
        );
    }
}
