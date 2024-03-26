<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'employee_id',
        'employee_name',
        'employee_email',
        'employee_designation',
        'employee_photo',
        
    ];
}
