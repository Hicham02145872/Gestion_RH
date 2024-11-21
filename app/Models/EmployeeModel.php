<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Employee;

class EmployeeModel extends Model
{
    protected $table = 'employees';  // Table name
    protected $primaryKey = 'id';    // Primary key

    // The entity class to use
    protected $returnType = Employee::class;

    // Fields that can be inserted or updated
    protected $allowedFields = [
        'name',
        'email',
        'position',
        'department',
        'phone',
        'hire_date',
        'salary',
        'status'
    ];

    // Automatically manage timestamps if needed (optional)
    protected $useTimestamps = false;

    // Use soft deletes if you want to mark records as deleted without actually removing them
    protected $useSoftDeletes = false;

    // Validation rules (optional, add as needed)
    protected $validationRules = [
        'name'      => 'required|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'position'  => 'required|max_length[50]',
        'phone'     => 'permit_empty|max_length[20]',
        'salary'    => 'permit_empty|decimal',
        'status'    => 'permit_empty|max_length[20]',
    ];

    // Custom messages for validation errors (optional)
    protected $validationMessages = [];
}
