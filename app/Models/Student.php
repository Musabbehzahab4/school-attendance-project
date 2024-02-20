<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\NullableType;
use  App\Models\Classes;


class Student extends Model
{
    use HasFactory;
    protected $table = "student";
    protected $primaryKey = 's_id';
    public function student_class(){
        return $this->belongsTo(Classes::class,"classes",'c_id');
    }
}
