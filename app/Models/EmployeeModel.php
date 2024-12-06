<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Employee;

class EmployeeModel extends Model
{
    protected $table = 'employees';  // Table name
    protected $primaryKey = 'id';    // Primary key

    // The entity class to use
    protected $returnType = \App\Entities\Employee::class;

    // Fields that can be inserted or updated
    protected $allowedFields = [
        'name',
        'email',
        'position',
        'department',
        'phone',
        'hire_date',
        'salary',
        'status',
        'user_id'
    ];

    // Automatically manage timestamps if needed (optional)
    protected $useTimestamps = false;

    protected $useSoftDeletes = false;

    protected $validationMessages = [];
}