<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['picture','name','contact','altContact','email','department_id','designation_id','branch','salary','hireDate',];


    public  function department()
{ 
    return  $this->belongsTo(Department::class,'department_id'); 
}
public  function designation()
{
    return $this->belongsTo(Designation::class, 'designation_id');
}
}
