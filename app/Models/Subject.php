<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\NullableType;
use  App\Models\Classes;


class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    public function class(){
        return $this->belongsTo(Classes::class,"classes",'c_id');
    }
}
