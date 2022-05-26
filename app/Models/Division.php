<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getClass()
    {
        return $this->belongsTo(SchoolClass::class,'class_id');
    }
}
