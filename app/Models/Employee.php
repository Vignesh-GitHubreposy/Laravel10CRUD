<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_name',
        'emp_email',
        'emp_phno',
        'emp_dob',
        'emp_address',
        'emp_designation',
        'emp_doj',
        'emp_photo',
    ];
}
