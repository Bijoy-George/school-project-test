<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
     use SoftDeletes;
    protected $guarded = [];

    public function getClass()
    {
        return $this->belongsTo(SchoolClass::class,'class');
    }
    public function getDivision()
    {
        return $this->belongsTo(Division::class,'division');
    }

}
