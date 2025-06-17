<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalaryCertificate extends Model
{
    use HasFactory;

    protected $table = 'salary_certificates';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'employee_name_kh',
        'employee_name_en',
        'gender',
        'date_of_birth',
        'nationality',
        'ethnicity',
        'place_of_birth',
        'type_of_employee',
        'employee_position',
        'employee_serve',
        'employee_salary',
        'status',
        'created_at',
        'updated_at',
    ];
}
