<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeMetadata extends Model
{
    use HasFactory;
    protected $fillable=[
        'department_id','bloodgroup','contact','address','date_of_birth','age','salary','joining_date','city'
    ];
}
