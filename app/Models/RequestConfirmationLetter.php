<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestConfirmationLetter extends Model
{
    use HasFactory;

    protected $table = 'request_confirmation_letters';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type_of_letter',
        'reference',
        'employee_name_kh',
        'day_of_birth',
        'month_of_birth',
        'year_of_birth',
        'type_of_employee',
        'employee_position',
        'department_name',
        'purpose',
        'status',
    ];
}
